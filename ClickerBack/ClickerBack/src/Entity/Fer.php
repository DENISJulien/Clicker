<?php

namespace App\Entity;

use App\Repository\FerRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=FerRepository::class)
 */
class Fer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"list_fer"})
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     * @Groups({"list_fer"})
     */
    private $ferCount;

    /**
     * @ORM\Column(type="float")
     * @Groups({"list_fer"})
     */
    private $ferByClick;

    /**
     * @ORM\Column(type="float")
     * @Groups({"list_fer"})
     */
    private $ferByAutoIncrement;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"list_fer"})
     */
    private $ferLevel;

    /**
     * @ORM\Column(type="float")
     * @Groups({"list_fer"})
     */
    private $ferPrice;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFerCount(): ?float
    {
        return $this->ferCount;
    }

    public function setFerCount(float $ferCount): self
    {
        $this->ferCount = $ferCount;

        return $this;
    }

    public function getFerByClick(): ?float
    {
        return $this->ferByClick;
    }

    public function setFerByClick(float $ferByClick): self
    {
        $this->ferByClick = $ferByClick;

        return $this;
    }

    public function getFerByAutoIncrement(): ?float
    {
        return $this->ferByAutoIncrement;
    }

    public function setFerByAutoIncrement(float $ferByAutoIncrement): self
    {
        $this->ferByAutoIncrement = $ferByAutoIncrement;

        return $this;
    }

    public function getFerLevel(): ?int
    {
        return $this->ferLevel;
    }

    public function setFerLevel(int $ferLevel): self
    {
        $this->ferLevel = $ferLevel;

        return $this;
    }

    public function getFerPrice(): ?float
    {
        return $this->ferPrice;
    }

    public function setFerPrice(float $ferPrice): self
    {
        $this->ferPrice = $ferPrice;

        return $this;
    }

}
