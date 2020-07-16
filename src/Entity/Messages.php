<?php

namespace App\Entity;

use App\Repository\MessagesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessagesRepository::class)
 */
class Messages
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $contentMessage;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateMessage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emailMessage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $senderMessage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContentMessage(): ?string
    {
        return $this->contentMessage;
    }

    public function setContentMessage(string $contentMessage): self
    {
        $this->contentMessage = $contentMessage;

        return $this;
    }

    public function getDateMessage(): ?\DateTimeInterface
    {
        return $this->dateMessage;
    }

    public function setDateMessage(\DateTimeInterface $dateMessage): self
    {
        $this->dateMessage = $dateMessage;

        return $this;
    }

    public function getEmailMessage(): ?string
    {
        return $this->emailMessage;
    }

    public function setEmailMessage(string $emailMessage): self
    {
        $this->emailMessage = $emailMessage;

        return $this;
    }

    public function getSenderMessage(): ?string
    {
        return $this->senderMessage;
    }

    public function setSenderMessage(string $senderMessage): self
    {
        $this->senderMessage = $senderMessage;

        return $this;
    }
}
