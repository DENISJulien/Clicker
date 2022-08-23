<?php

namespace App\Entity;

use App\Repository\CraftResourcesRepository;
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
}
