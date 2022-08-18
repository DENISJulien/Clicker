<?php

namespace App\Entity;

use App\Repository\CuivreRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CuivreRepository::class)
 */
class Cuivre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"list_cuivre"})
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     * @Groups({"list_cuivre"})
     */
    private $cuivreCount;

    /**
     * @ORM\Column(type="float")
     * @Groups({"list_cuivre"})
     */
    private $cuivreByClick;

    /**
     * @ORM\Column(type="float")
     * @Groups({"list_cuivre"})
     */
    private $cuivreByAutoIncrement;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"list_cuivre"})
     */
    private $cuivreLevel;

    /**
     * @ORM\Column(type="float")
     * @Groups({"list_cuivre"})
     */
    private $cuivrePrice;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCuivreCount(): ?float
    {
        return $this->cuivreCount;
    }

    public function setCuivreCount(float $cuivreCount): self
    {
        $this->cuivreCount = $cuivreCount;

        return $this;
    }

    public function getCuivreByClick(): ?float
    {
        return $this->cuivreByClick;
    }

    public function setCuivreByClick(float $cuivreByClick): self
    {
        $this->cuivreByClick = $cuivreByClick;

        return $this;
    }

    public function getCuivreByAutoIncrement(): ?float
    {
        return $this->cuivreByAutoIncrement;
    }

    public function setCuivreByAutoIncrement(float $cuivreByAutoIncrement): self
    {
        $this->cuivreByAutoIncrement = $cuivreByAutoIncrement;

        return $this;
    }

    public function getCuivreLevel(): ?int
    {
        return $this->cuivreLevel;
    }

    public function setCuivreLevel(int $cuivreLevel): self
    {
        $this->cuivreLevel = $cuivreLevel;

        return $this;
    }

    public function getCuivrePrice(): ?float
    {
        return $this->cuivrePrice;
    }

    public function setCuivrePrice(float $cuivrePrice): self
    {
        $this->cuivrePrice = $cuivrePrice;

        return $this;
    }
}
