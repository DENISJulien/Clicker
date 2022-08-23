<?php

namespace App\Entity;

use App\Repository\BasicResourcesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BasicResourcesRepository::class)
 */
class BasicResources
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
    private $basicResourcesName;

    /**
     * @ORM\Column(type="integer")
     */
    private $basicResourcesCount;

    /**
     * @ORM\Column(type="integer")
     */
    private $basicResourcesByClick;

    /**
     * @ORM\Column(type="integer")
     */
    private $basicResourcesByAutoIncrement;

    /**
     * @ORM\Column(type="boolean")
     */
    private $basicResourcesStatus;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="basicResources")
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

    public function getBasicResourcesName(): ?string
    {
        return $this->basicResourcesName;
    }

    public function setBasicResourcesName(string $basicResourcesName): self
    {
        $this->basicResourcesName = $basicResourcesName;

        return $this;
    }

    public function getBasicResourcesCount(): ?int
    {
        return $this->basicResourcesCount;
    }

    public function setBasicResourcesCount(int $basicResourcesCount): self
    {
        $this->basicResourcesCount = $basicResourcesCount;

        return $this;
    }

    public function getBasicResourcesByClick(): ?int
    {
        return $this->basicResourcesByClick;
    }

    public function setBasicResourcesByClick(int $basicResourcesByClick): self
    {
        $this->basicResourcesByClick = $basicResourcesByClick;

        return $this;
    }

    public function getBasicResourcesByAutoIncrement(): ?int
    {
        return $this->basicResourcesByAutoIncrement;
    }

    public function setBasicResourcesByAutoIncrement(int $basicResourcesByAutoIncrement): self
    {
        $this->basicResourcesByAutoIncrement = $basicResourcesByAutoIncrement;

        return $this;
    }

    public function isBasicResourcesStatus(): ?bool
    {
        return $this->basicResourcesStatus;
    }

    public function setBasicResourcesStatus(bool $basicResourcesStatus): self
    {
        $this->basicResourcesStatus = $basicResourcesStatus;

        return $this;
    }

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
            $user->setBasicResources($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getBasicResources() === $this) {
                $user->setBasicResources(null);
            }
        }

        return $this;
    }
}
