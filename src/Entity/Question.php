<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionRepository")
 */
class Question
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
    private $question;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie", inversedBy="questions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reponse", mappedBy="question")
     */
    private $reponses;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ReponseUser", mappedBy="question", orphanRemoval=true)
     */
    private $reponseUsers;

    public function __construct()
    {
        $this->reponses = new ArrayCollection();
        $this->reponseUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|Reponse[]
     */
    public function getReponses(): Collection
    {
        return $this->reponses;
    }

    public function addReponse(Reponse $reponse): self
    {
        if (!$this->reponses->contains($reponse)) {
            $this->reponses[] = $reponse;
            $reponse->setQuestion($this);
        }

        return $this;
    }

    public function removeReponse(Reponse $reponse): self
    {
        if ($this->reponses->contains($reponse)) {
            $this->reponses->removeElement($reponse);
            // set the owning side to null (unless already changed)
            if ($reponse->getQuestion() === $this) {
                $reponse->setQuestion(null);
            }
        }

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
            $reponseUser->setQuestion($this);
        }

        return $this;
    }

    public function removeReponseUser(ReponseUser $reponseUser): self
    {
        if ($this->reponseUsers->contains($reponseUser)) {
            $this->reponseUsers->removeElement($reponseUser);
            // set the owning side to null (unless already changed)
            if ($reponseUser->getQuestion() === $this) {
                $reponseUser->setQuestion(null);
            }
        }

        return $this;
    }
}
