<?php

namespace App\Entity;

use App\Repository\TechnologyTreeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TechnologyTreeRepository::class)
 */
class TechnologyTree
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $technologyTreeName;

    /**
     * @ORM\Column(type="integer")
     */
    private $technologyTreePrice;

    /**
     * @ORM\Column(type="boolean")
     */
    private $technologyTreeStatus;

    /******** RELATION ********/

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="technologyTree")
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTechnologyTreeName(): ?string
    {
        return $this->technologyTreeName;
    }

    public function setTechnologyTreeName(string $technologyTreeName): self
    {
        $this->technologyTreeName = $technologyTreeName;

        return $this;
    }

    public function getTechnologyTreePrice(): ?int
    {
        return $this->technologyTreePrice;
    }

    public function setTechnologyTreePrice(int $technologyTreePrice): self
    {
        $this->technologyTreePrice = $technologyTreePrice;

        return $this;
    }

    public function isTechnologyTreeStatus(): ?bool
    {
        return $this->technologyTreeStatus;
    }

    public function setTechnologyTreeStatus(bool $technologyTreeStatus): self
    {
        $this->technologyTreeStatus = $technologyTreeStatus;

        return $this;
    }

    /******** RELATION ********/

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addTechnologyTree($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeTechnologyTree($this);
        }

        return $this;
    }

}
