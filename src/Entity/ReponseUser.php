<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReponseUserRepository")
 */
class ReponseUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="reponseUsers")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Question", inversedBy="reponseUsers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $question;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Reponse", inversedBy="reponseUsers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reponse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $userAnonyme;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasRight;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(?Question $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getReponse(): ?Reponse
    {
        return $this->reponse;
    }

    public function setReponse(?Reponse $reponse): self
    {
        $this->reponse = $reponse;

        return $this;
    }

    public function getUserAnonyme(): ?string
    {
        return $this->userAnonyme;
    }

    public function setUserAnonyme(?string $userAnonyme): self
    {
        $this->userAnonyme = $userAnonyme;

        return $this;
    }

    public function getHasRight(): ?bool
    {
        return $this->hasRight;
    }

    public function setHasRight(bool $hasRight): self
    {
        $this->hasRight = $hasRight;

        return $this;
    }
}
