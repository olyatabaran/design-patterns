<?php

namespace App\Creational\FactoryMethod\Entity;

use App\Creational\FactoryMethod\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Novelty::class, inversedBy: 'users')]
    private Collection $novelties;

    #[ORM\ManyToMany(targetEntity: Post::class, inversedBy: 'users')]
    private Collection $posts;

    public function __construct()
    {
        $this->novelties = new ArrayCollection();
        $this->posts = new ArrayCollection();
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
     * @return Collection<int, Novelty>
     */
    public function getNovelties(): Collection
    {
        return $this->novelties;
    }

    public function addNovelty(Novelty $novelty): self
    {
        if (!$this->novelties->contains($novelty)) {
            $this->novelties[] = $novelty;
        }

        return $this;
    }

    public function removeNovelty(Novelty $novelty): self
    {
        $this->novelties->removeElement($novelty);

        return $this;
    }

    /**
     * @return Collection<int, Post>
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    public function addPost(Post $post): self
    {
        if (!$this->posts->contains($post)) {
            $this->posts[] = $post;
        }

        return $this;
    }

    public function removePost(Post $post): self
    {
        $this->posts->removeElement($post);

        return $this;
    }
}
