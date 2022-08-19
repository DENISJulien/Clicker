<?php

namespace App\Entity;

use App\Repository\BasicResourcesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=BasicResourcesRepository::class)
 */
class BasicResources
{
    /********** ID **********/

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"list_basic"})
     */
    private $id;


    public function getId(): ?int
    {
        return $this->id;
    }


    /********** FER **********/

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"list_basic"})
     */
    private $ferName;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"list_basic"})
     */
    private $ferCount;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"list_basic"})
     */
    private $ferByClick;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"list_basic"})
     */
    private $ferByAutoIncrement;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"list_basic"})
     */
    private $ferStatus;


    public function getFerCount(): ?int
    {
        return $this->ferCount;
    }

    public function setFerCount(int $ferCount): self
    {
        $this->ferCount = $ferCount;

        return $this;
    }

    public function getFerByClick(): ?int
    {
        return $this->ferByClick;
    }

    public function setFerByClick(int $ferByClick): self
    {
        $this->ferByClick = $ferByClick;

        return $this;
    }

    public function getFerByAutoIncrement(): ?int
    {
        return $this->ferByAutoIncrement;
    }

    public function setFerByAutoIncrement(int $ferByAutoIncrement): self
    {
        $this->ferByAutoIncrement = $ferByAutoIncrement;

        return $this;
    }

    public function isFerStatus(): ?bool
    {
        return $this->ferStatus;
    }

    public function setFerStatus(bool $ferStatus): self
    {
        $this->ferStatus = $ferStatus;

        return $this;
    }

    public function getFerName(): ?string
    {
        return $this->ferName;
    }

    public function setFerName(string $ferName): self
    {
        $this->ferName = $ferName;

        return $this;
    }


    /********** CUIVRE **********/

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"list_basic"})
     */
    private $cuivreName;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"list_basic"})
     */
    private $cuivreCount;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"list_basic"})
     */
    private $cuivreByClick;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"list_basic"})
     */
    private $cuivreByAutoIncrement;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"list_basic"})
     */
    private $cuivreStatus;


    public function getCuivreName(): ?string
    {
        return $this->cuivreName;
    }

    public function setCuivreName(string $cuivreName): self
    {
        $this->cuivreName = $cuivreName;

        return $this;
    }

    public function getCuivreCount(): ?int
    {
        return $this->cuivreCount;
    }

    public function setCuivreCount(int $cuivreCount): self
    {
        $this->cuivreCount = $cuivreCount;

        return $this;
    }

    public function getCuivreByClick(): ?int
    {
        return $this->cuivreByClick;
    }

    public function setCuivreByClick(int $cuivreByClick): self
    {
        $this->cuivreByClick = $cuivreByClick;

        return $this;
    }

    public function getCuivreByAutoIncrement(): ?int
    {
        return $this->cuivreByAutoIncrement;
    }

    public function setCuivreByAutoIncrement(int $cuivreByAutoIncrement): self
    {
        $this->cuivreByAutoIncrement = $cuivreByAutoIncrement;

        return $this;
    }

    public function isCuivreStatus(): ?bool
    {
        return $this->cuivreStatus;
    }

    public function setCuivreStatus(bool $cuivreStatus): self
    {
        $this->cuivreStatus = $cuivreStatus;

        return $this;
    }

}
