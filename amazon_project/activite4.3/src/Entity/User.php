<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Messages::class, mappedBy="user")
     */
    private $text;

    public function __construct()
    {
        $this->text = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Messages>
     */
    public function getText(): Collection
    {
        return $this->text;
    }

    public function addText(Messages $text): self
    {
        if (!$this->text->contains($text)) {
            $this->text[] = $text;
            $text->addUser($this);
        }

        return $this;
    }

    public function removeText(Messages $text): self
    {
        if ($this->text->removeElement($text)) {
            $text->removeUser($this);
        }

        return $this;
    }
}
