<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"show_user"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups({"show_user"})
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     * @Groups({"show_user"})
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"show_user"})
     */
    private $nameUser;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Slug(fields={"nameUser"})
     * @Groups({"show_user"})
     */
    private $slug;

    /******** RELATIONS ********/

    /**
     * @ORM\ManyToMany(targetEntity=BasicResources::class, inversedBy="users")
     * @Groups({"show_user"})
     */
    private $basicResources;

    /**
     * @ORM\ManyToMany(targetEntity=CraftResources::class, inversedBy="users")
     * @Groups({"show_user"})
     */
    private $craftResources;

    /**
     * @ORM\ManyToMany(targetEntity=TechnologyTree::class, inversedBy="users")
     * @Groups({"show_user"})
     */
    private $technologyTree;

    

    public function __construct()
    {
        $this->basicResources = new ArrayCollection();
        $this->craftResources = new ArrayCollection();
        $this->technologyTree = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNameUser(): ?string
    {
        return $this->nameUser;
    }

    public function setNameUser(string $nameUser): self
    {
        $this->nameUser = $nameUser;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /******** RELATIONS ********/

    /**
     * @return Collection<int, BasicResources>
     */
    public function getBasicResources(): Collection
    {
        return $this->basicResources;
    }

    public function addBasicResource(BasicResources $basicResource): self
    {
        if (!$this->basicResources->contains($basicResource)) {
            $this->basicResources[] = $basicResource;
        }

        return $this;
    }

    public function removeBasicResource(BasicResources $basicResource): self
    {
        $this->basicResources->removeElement($basicResource);

        return $this;
    }

    /**
     * @return Collection<int, CraftResources>
     */
    public function getCraftResources(): Collection
    {
        return $this->craftResources;
    }

    public function addCraftResource(CraftResources $craftResource): self
    {
        if (!$this->craftResources->contains($craftResource)) {
            $this->craftResources[] = $craftResource;
        }

        return $this;
    }

    public function removeCraftResource(CraftResources $craftResource): self
    {
        $this->craftResources->removeElement($craftResource);

        return $this;
    }

    /**
     * @return Collection<int, TechnologyTree>
     */
    public function getTechnologyTree(): Collection
    {
        return $this->technologyTree;
    }

    public function addTechnologyTree(TechnologyTree $technologyTree): self
    {
        if (!$this->technologyTree->contains($technologyTree)) {
            $this->technologyTree[] = $technologyTree;
        }

        return $this;
    }

    public function removeTechnologyTree(TechnologyTree $technologyTree): self
    {
        $this->technologyTree->removeElement($technologyTree);

        return $this;
    }

}
