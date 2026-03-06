<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: "Le nom est obligatoire")]
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Le nom doit comporter au moins 3 caractères',
        maxMessage: 'Le nom doit comporter maximum 50 caractères'
    )]
    private ?string $lastname = null;



    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(
        message: "Le prénom est obligatoire"
    )]
    #[Assert\Length(
        min: 3,
        max: 50,
        minMessage: 'Le prénom doit comporter au moins 3 caractères',
        maxMessage: 'Le prénom doit comporter maximum 50 caractères'
    )]
    private ?string $firstname = null;


    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(
        message: "L'email est obligatoire"
    )]
    #[Assert\Email(
        message: "L'adresse {{ value }} est invalide.",
    )]
    private ?string $email = null;


    #[ORM\Column(length: 20)]
    #[Assert\Regex(
        pattern: "/^0[1-9]( ?[0-9]{2}){4}$/",
        message: "Le numéro de téléphone n'est pas valide."
    )]
    private ?string $phone = null;

    #[ORM\Column(length: 255, nullable: true)]
    
    #[Assert\NotBlank(message: "Vous devez entrer un message")]
    #[Assert\Length(
        min: 50,
        max: 255,
        minMessage: 'Votre message doit comporter au moins 50 caractères',
        maxMessage: 'Votre message ne doit pas dépasser 255 caractères'
    )]
    private ?string $message = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }
}
