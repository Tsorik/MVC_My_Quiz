<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReponseRepository")
 */
class Reponse
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reponse;

    /**
     * @ORM\Column(type="boolean")
     */
    private $reponseExpected;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Question", inversedBy="reponses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $question;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ReponseUser", mappedBy="reponse", orphanRemoval=true)
     */
    private $reponseUsers;

    public function __construct()
    {
        $this->reponseUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReponse(): ?string
    {
        return $this->reponse;
    }

    public function setReponse(string $reponse): self
    {
        $this->reponse = $reponse;

        return $this;
    }

    public function getReponseExpected(): ?bool
    {
        return $this->reponseExpected;
    }

    public function setReponseExpected(bool $reponseExpected): self
    {
        $this->reponseExpected = $reponseExpected;

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

    /**
     * @return Collection|ReponseUser[]
     */
    public function getReponseUsers(): Collection
    {
        return $this->reponseUsers;
    }

    public function addReponseUser(ReponseUser $reponseUser): self
    {
        if (!$this->reponseUsers->contains($reponseUser)) {
            $this->reponseUsers[] = $reponseUser;
            $reponseUser->setReponse($this);
        }

        return $this;
    }

    public function removeReponseUser(ReponseUser $reponseUser): self
    {
        if ($this->reponseUsers->contains($reponseUser)) {
            $this->reponseUsers->removeElement($reponseUser);
            // set the owning side to null (unless already changed)
            if ($reponseUser->getReponse() === $this) {
                $reponseUser->setReponse(null);
            }
        }

        return $this;
    }
}
