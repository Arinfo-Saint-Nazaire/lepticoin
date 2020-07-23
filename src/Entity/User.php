<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    public const ROLE_USER= 'ROLE_USER';
    public const ROLE_ADMIN= 'ROLE_ADMIN';
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $firstNameUser;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $lastNameUser;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photoUser;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $birthdayDateUser;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $phoneUser;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $adressUser;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $cityUser;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $postalCodeUser;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $civilityUser;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $registrationDateUser;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $pseudoUser;

    /**
     * @ORM\OneToMany(targetEntity=Notice::class, mappedBy="user")
     */
    private $Notice;

    public function __construct(){ 
        $this->roles= [self::ROLE_USER];
        $this->Notice = new ArrayCollection();
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
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getFirstNameUser(): ?string
    {
        return $this->firstNameUser;
    }

    public function setFirstNameUser(?string $firstNameUser): self
    {
        $this->firstNameUser = $firstNameUser;

        return $this;
    }

    public function getLastNameUser(): ?string
    {
        return $this->lastNameUser;
    }

    public function setLastNameUser(?string $lastNameUser): self
    {
        $this->lastNameUser = $lastNameUser;

        return $this;
    }

    public function getPhotoUser(): ?string
    {
        return $this->photoUser;
    }

    public function setPhotoUser(?string $photoUser): self
    {
        $this->photoUser = $photoUser;

        return $this;
    }

    public function getBirthdayDateUser(): ?\DateTimeInterface
    {
        return $this->birthdayDateUser;
    }

    public function setBirthdayDateUser(?\DateTimeInterface $birthdayDateUser): self
    {
        $this->birthdayDateUser = $birthdayDateUser;

        return $this;
    }

    public function getPhoneUser(): ?string
    {
        return $this->phoneUser;
    }

    public function setPhoneUser(?string $phoneUser): self
    {
        $this->phoneUser = $phoneUser;

        return $this;
    }

    public function getAdressUser(): ?string
    {
        return $this->adressUser;
    }

    public function setAdressUser(?string $adressUser): self
    {
        $this->adressUser = $adressUser;

        return $this;
    }

    public function getCityUser(): ?string
    {
        return $this->cityUser;
    }

    public function setCityUser(?string $cityUser): self
    {
        $this->cityUser = $cityUser;

        return $this;
    }

    public function getPostalCodeUser(): ?string
    {
        return $this->postalCodeUser;
    }

    public function setPostalCodeUser(?string $postalCodeUser): self
    {
        $this->postalCodeUser = $postalCodeUser;

        return $this;
    }

    public function getCivilityUser(): ?bool
    {
        return $this->civilityUser;
    }

    public function setCivilityUser(?bool $civilityUser): self
    {
        $this->civilityUser = $civilityUser;

        return $this;
    }

    public function getRegistrationDateUser(): ?\DateTimeInterface
    {
        return $this->registrationDateUser;
    }

    public function setRegistrationDateUser(?\DateTimeInterface $registrationDateUser): self
    {
        $this->registrationDateUser = $registrationDateUser;

        return $this;
    }

    public function getPseudoUser(): ?string
    {
        return $this->pseudoUser;
    }

    public function setPseudoUser(?string $pseudoUser): self
    {
        $this->pseudoUser = $pseudoUser;

        return $this;
    }

    /**
     * @return Collection|Notice[]
     */
    public function getNotice(): Collection
    {
        return $this->Notice;
    }

    public function addNotice(Notice $notice): self
    {
        if (!$this->Notice->contains($notice)) {
            $this->Notice[] = $notice;
            $notice->setUser($this);
        }

        return $this;
    }

    public function removeNotice(Notice $notice): self
    {
        if ($this->Notice->contains($notice)) {
            $this->Notice->removeElement($notice);
            // set the owning side to null (unless already changed)
            if ($notice->getUser() === $this) {
                $notice->setUser(null);
            }
        }

        return $this;
    }
}
