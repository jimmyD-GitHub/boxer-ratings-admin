<?php

namespace App\Entity;

use DateTime;
use DateTimeZone;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BoxerRepository")
 */
class Boxer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     * @Assert\Length(max=45)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", name="boxrec_id")
     */
    private $boxrecId;

    /**
     * @ORM\Column(type="string", length=2)
     * @Assert\Length(max=2)
     */
    private $nationality;

    /**
     * @ORM\Column(type="date")
     */
    private $dob;

    /**
     * @ORM\Column(type="string", length=20)
     * @Assert\Length(max=20)
     */
    private $record;

    /**
     * @ORM\Column(type="string", length=45, name="home_town")
     * @Assert\Length(max=45)
     */
    private $homeTown;

    /**
     * @ORM\Column(type="text")
     */
    private $snippet;

    /**
     * @ORM\Column(type="string", length=18)
     * @Assert\Length(max=18)
     */
    private $titles;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     * @Assert\Length(max=15)
     */
    private $twitter;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enabled = true;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Division", inversedBy="boxers")
     * @ORM\JoinColumn(nullable=false, name="division_id", referencedColumnName="id")
     * @var Division
     */
    private $division;

    public function __construct()
    {
        $now = new DateTime();
        $now->setTimezone(new DateTimeZone('UTC'));

        $this->createdAt = $now;
        $this->updatedAt = $now;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Boxer
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getBoxrecId(): ?int
    {
        return $this->boxrecId;
    }

    /**
     * @param int $boxrecId
     * @return Boxer
     */
    public function setBoxrecId(int $boxrecId): self
    {
        $this->boxrecId = $boxrecId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    /**
     * @param string $nationality
     * @return Boxer
     */
    public function setNationality(string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDob(): ?DateTimeInterface
    {
        return $this->dob;
    }

    /**
     * @param DateTimeInterface $dob
     * @return Boxer
     */
    public function setDob(DateTimeInterface $dob): self
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRecord(): ?string
    {
        return $this->record;
    }

    /**
     * @param string $record
     * @return Boxer
     */
    public function setRecord(string $record): self
    {
        $this->record = $record;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getHomeTown(): ?string
    {
        return $this->homeTown;
    }

    /**
     * @param string $homeTown
     * @return Boxer
     */
    public function setHomeTown(string $homeTown): self
    {
        $this->homeTown = $homeTown;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSnippet(): ?string
    {
        return $this->snippet;
    }

    /**
     * @param string $snippet
     * @return Boxer
     */
    public function setSnippet(string $snippet): self
    {
        $this->snippet = $snippet;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitles(): ?string
    {
        return $this->titles;
    }

    /**
     * @param string $titles
     * @return Boxer
     */
    public function setTitles(string $titles): self
    {
        $this->titles = $titles;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTwitter(): ?string
    {
        return $this->twitter;
    }

    /**
     * @param string $twitter
     * @return Boxer
     */
    public function setTwitter(string $twitter): self
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     * @return Boxer
     */
    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param DateTimeInterface $createdAt
     * @return Boxer
     */
    public function setCreatedAt(DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTimeInterface $updatedAt
     * @return Boxer
     */
    public function setUpdatedAt(DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDeletedAt(): ?DateTimeInterface
    {
        return $this->deletedAt;
    }

    /**
     * @param DateTimeInterface|null $deletedAt
     * @return Boxer
     */
    public function setDeletedAt(?DateTimeInterface $deletedAt): self
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * @return Division|null
     */
    public function getDivision(): ?Division
    {
        return $this->division;
    }

    /**
     * @param Division|null $division
     * @return Boxer
     */
    public function setDivision(?Division $division): self
    {
        $this->division = $division;

        return $this;
    }

    /**
     * @return int
     */
    public function getDivisionId(): int
    {
        if ($this->hasDivisionId()) {
            return $this->division->getId();
        }

        return 0;
    }

    /**
     * @return bool
     */
    public function hasDivisionId(): bool
    {
        return $this->division instanceof Division;
    }

    /**
     * @return mixed
     */
    public function __toString(): string
    {
        return $this->name;
    }
}
