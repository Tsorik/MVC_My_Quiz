<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"email"}, message="email already use !")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8", minMessage="Password too short !")
     */
    private $password;

    /** 
    * @Assert\EqualTo(propertyPath="password", message="password need to same") 
    */
    public $confirm_password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ReponseUser", mappedBy="user")
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function eraseCredentials(){

    }

    public function getSalt(){

    }

    public function getRoles(){
        return ['ROLE_USER'];
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
            $reponseUser->setUser($this);
        }

        return $this;
    }

    public function removeReponseUser(ReponseUser $reponseUser): self
    {
        if ($this->reponseUsers->contains($reponseUser)) {
            $this->reponseUsers->removeElement($reponseUser);
            // set the owning side to null (unless already changed)
            if ($reponseUser->getUser() === $this) {
                $reponseUser->setUser(null);
            }
        }

        return $this;
    }
}
