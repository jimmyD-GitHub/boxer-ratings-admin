<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DivisionRepository")
 */
class Division
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", name="updated_at")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true, name="deleted_at")
     */
    private $deletedAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Boxer", mappedBy="divisionId")
     */
    private $boxers;

    public function __construct()
    {
        $this->boxers = new ArrayCollection();
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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getDeletedAt(): ?\DateTimeInterface
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(?\DateTimeInterface $deletedAt): self
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * @return Collection|Boxer[]
     */
    public function getBoxers(): Collection
    {
        return $this->boxers;
    }

    public function addBoxer(Boxer $boxer): self
    {
        if (!$this->boxers->contains($boxer)) {
            $this->boxers[] = $boxer;
            $boxer->setDivisionId($this);
        }

        return $this;
    }

    public function removeBoxer(Boxer $boxer): self
    {
        if ($this->boxers->contains($boxer)) {
            $this->boxers->removeElement($boxer);
            // set the owning side to null (unless already changed)
            if ($boxer->getDivisionId() === $this) {
                $boxer->setDivisionId(null);
            }
        }

        return $this;
    }
}
