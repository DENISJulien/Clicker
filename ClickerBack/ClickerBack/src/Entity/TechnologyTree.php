<?php

namespace App\Entity;

use App\Repository\TechnologyTreeRepository;
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
     * @ORM\Column(type="integer")
     */
    private $priceUpgradeByClickLevelOne;

    /**
     * @ORM\Column(type="integer")
     */
    private $priceUpgradeByAutoIncrementLevelOne;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameUpgradeByClickLevelOne;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NameUpgradeByAutoIncrementLevelOne;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPriceUpgradeByClickLevelOne(): ?int
    {
        return $this->priceUpgradeByClickLevelOne;
    }

    public function setPriceUpgradeByClickLevelOne(int $priceUpgradeByClickLevelOne): self
    {
        $this->priceUpgradeByClickLevelOne = $priceUpgradeByClickLevelOne;

        return $this;
    }

    public function getPriceUpgradeByAutoIncrementLevelOne(): ?int
    {
        return $this->priceUpgradeByAutoIncrementLevelOne;
    }

    public function setPriceUpgradeByAutoIncrementLevelOne(int $priceUpgradeByAutoIncrementLevelOne): self
    {
        $this->priceUpgradeByAutoIncrementLevelOne = $priceUpgradeByAutoIncrementLevelOne;

        return $this;
    }

    public function getNameUpgradeByClickLevelOne(): ?string
    {
        return $this->nameUpgradeByClickLevelOne;
    }

    public function setNameUpgradeByClickLevelOne(string $nameUpgradeByClickLevelOne): self
    {
        $this->nameUpgradeByClickLevelOne = $nameUpgradeByClickLevelOne;

        return $this;
    }

    public function getNameUpgradeByAutoIncrementLevelOne(): ?string
    {
        return $this->NameUpgradeByAutoIncrementLevelOne;
    }

    public function setNameUpgradeByAutoIncrementLevelOne(string $NameUpgradeByAutoIncrementLevelOne): self
    {
        $this->NameUpgradeByAutoIncrementLevelOne = $NameUpgradeByAutoIncrementLevelOne;

        return $this;
    }
}
