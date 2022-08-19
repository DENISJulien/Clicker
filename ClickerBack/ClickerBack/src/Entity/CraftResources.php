<?php

namespace App\Entity;

use App\Repository\CraftResourcesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CraftResourcesRepository::class)
 */
class CraftResources
{
    /********** ID **********/

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"list_craft"})
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    /********** ENGRENAGE **********/

    /**
     * @ORM\Column(type="integer")
     * @Groups({"list_craft"})
     */
    private $countEngrenage;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"list_craft"})
     */
    private $statusEngrenage;

    public function getCountEngrenage(): ?int
    {
        return $this->countEngrenage;
    }

    public function setCountEngrenage(int $countEngrenage): self
    {
        $this->countEngrenage = $countEngrenage;

        return $this;
    }

    public function isStatusEngrenage(): ?bool
    {
        return $this->statusEngrenage;
    }

    public function setStatusEngrenage(bool $statusEngrenage): self
    {
        $this->statusEngrenage = $statusEngrenage;

        return $this;
    }

    /********** PLAQUE DE CUIVRE **********/

    /**
     * @ORM\Column(type="integer")
     * @Groups({"list_craft"})
     */
    private $countPlaqueDeCuivre;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"list_craft"})
     */
    private $statusPlaqueDeCuivre;

    public function getCountPlaqueDeCuivre(): ?int
    {
        return $this->countPlaqueDeCuivre;
    }

    public function setCountPlaqueDeCuivre(int $countPlaqueDeCuivre): self
    {
        $this->countPlaqueDeCuivre = $countPlaqueDeCuivre;

        return $this;
    }

    public function isStatusPlaqueDeCuivre(): ?bool
    {
        return $this->statusPlaqueDeCuivre;
    }

    public function setStatusPlaqueDeCuivre(bool $statusPlaqueDeCuivre): self
    {
        $this->statusPlaqueDeCuivre = $statusPlaqueDeCuivre;

        return $this;
    }

    /********** PACK DE SCIENCE 1 **********/

    /**
     * @ORM\Column(type="integer")
     * @Groups({"list_craft"})
     */
    private $countPackDeScience1;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"list_craft"})
     */
    private $statusPackDeScience1;

    public function getCountPackDeScience1(): ?int
    {
        return $this->countPackDeScience1;
    }

    public function setCountPackDeScience1(int $countPackDeScience1): self
    {
        $this->countPackDeScience1 = $countPackDeScience1;

        return $this;
    }

    public function getStatusPackDeScience1(): ?int
    {
        return $this->statusPackDeScience1;
    }

    public function setStatusPackDeScience1(int $statusPackDeScience1): self
    {
        $this->statusPackDeScience1 = $statusPackDeScience1;

        return $this;
    }
}
