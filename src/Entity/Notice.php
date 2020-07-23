<?php

namespace App\Entity;

use App\Repository\NoticeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoticeRepository::class)
 */
class Notice
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $titleNotice;

    /**
     * @ORM\Column(type="integer")
     */
    private $priceNotice;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionNotice;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $locationNotice;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photoOneNotice;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photoTwoNotice;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photoThreeNotice;

    /**
     * @ORM\Column(type="boolean")
     */
    private $categoryProfessionnalNotice;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateNotice;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="Notice")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleNotice(): ?string
    {
        return $this->titleNotice;
    }

    public function setTitleNotice(string $titleNotice): self
    {
        $this->titleNotice = $titleNotice;

        return $this;
    }

    public function getPriceNotice(): ?int
    {
        return $this->priceNotice;
    }

    public function setPriceNotice(int $priceNotice): self
    {
        $this->priceNotice = $priceNotice;

        return $this;
    }

    public function getDescriptionNotice(): ?string
    {
        return $this->descriptionNotice;
    }

    public function setDescriptionNotice(string $descriptionNotice): self
    {
        $this->descriptionNotice = $descriptionNotice;

        return $this;
    }

    public function getLocationNotice(): ?string
    {
        return $this->locationNotice;
    }

    public function setLocationNotice(string $locationNotice): self
    {
        $this->locationNotice = $locationNotice;

        return $this;
    }

    public function getPhotoOneNotice(): ?string
    {
        return $this->photoOneNotice;
    }

    public function setPhotoOneNotice(string $photoOneNotice): self
    {
        $this->photoOneNotice = $photoOneNotice;

        return $this;
    }

    public function getPhotoTwoNotice(): ?string
    {
        return $this->photoTwoNotice;
    }

    public function setPhotoTwoNotice(?string $photoTwoNotice): self
    {
        $this->photoTwoNotice = $photoTwoNotice;

        return $this;
    }

    public function getPhotoThreeNotice(): ?string
    {
        return $this->photoThreeNotice;
    }

    public function setPhotoThreeNotice(?string $photoThreeNotice): self
    {
        $this->photoThreeNotice = $photoThreeNotice;

        return $this;
    }

    public function getCategoryProfessionnalNotice(): ?bool
    {
        return $this->categoryProfessionnalNotice;
    }

    public function setCategoryProfessionnalNotice(bool $categoryProfessionnalNotice): self
    {
        $this->categoryProfessionnalNotice = $categoryProfessionnalNotice;

        return $this;
    }

    public function getDateNotice(): ?\DateTimeInterface
    {
        return $this->dateNotice;
    }

    public function setDateNotice(\DateTimeInterface $dateNotice): self
    {
        $this->dateNotice = $dateNotice;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
