<?php

namespace App\Entity;

use App\Repository\CraftResourcesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CraftResourcesRepository::class)
 */
class CraftResources
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
    private $craftResourcesName;

    /**
     * @ORM\Column(type="integer")
     */
    private $craftResourcesCount;

    /**
     * @ORM\Column(type="boolean")
     */
    private $craftResourcesStatus;

    /******** RELATION ********/

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="craftResources")
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

    public function getCraftResourcesName(): ?string
    {
        return $this->craftResourcesName;
    }

    public function setCraftResourcesName(string $craftResourcesName): self
    {
        $this->craftResourcesName = $craftResourcesName;

        return $this;
    }

    public function getCraftResourcesCount(): ?int
    {
        return $this->craftResourcesCount;
    }

    public function setCraftResourcesCount(int $craftResourcesCount): self
    {
        $this->craftResourcesCount = $craftResourcesCount;

        return $this;
    }

    public function isCraftResourcesStatus(): ?bool
    {
        return $this->craftResourcesStatus;
    }

    public function setCraftResourcesStatus(bool $craftResourcesStatus): self
    {
        $this->craftResourcesStatus = $craftResourcesStatus;

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
            $user->addCraftResource($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeCraftResource($this);
        }

        return $this;
    }


}
