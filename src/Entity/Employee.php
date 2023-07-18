<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeeRepository::class)]
class Employee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateofbirth = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $datehired = null;

    #[ORM\ManyToOne(inversedBy: 'employees')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Society $society = null;

    public function __toString() {
        return $this->firstname." ".$this->lastname;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getDateofbirth(): ?\DateTimeInterface
    {
        return $this->dateofbirth;
    }

    public function setDateofbirth(\DateTimeInterface $dateofbirth): static
    {
        $this->dateofbirth = $dateofbirth;

        return $this;
    }

    public function getDatehired(): ?\DateTimeInterface
    {
        return $this->datehired;
    }

    public function setDatehired(\DateTimeInterface $datehired): static
    {
        $this->datehired = $datehired;

        return $this;
    }

    public function getSociety(): ?Society
    {
        return $this->society;
    }

    public function setSociety(?Society $society): static
    {
        $this->society = $society;

        return $this;
    }
}
