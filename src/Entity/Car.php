<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le nom ne doit pas être vide.")]
    #[Assert\Length(
        max: 50,
        maxMessage: "Le nom ne peut pas dépasser {{ limit }} caractères."
    )]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: "La description ne doit pas être vide.")]
    #[Assert\Length(
        min: 10,
        minMessage: "La description doit contenir au moins {{ limit }} caractères."
    )]
    private ?string $description = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Le prix mensuel est obligatoire.")]
    #[Assert\Positive(message: "Le prix mensuel doit être positif.")]
    private ?float $monthly_price = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Le prix journalier est obligatoire.")]
    #[Assert\Positive(message: "Le prix journalier doit être positif.")]
    private ?float $daily_price = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Le nombre de places est obligatoire.")]
    #[Assert\Positive(message: "Le nombre de places doit être positif.")]
    #[Assert\Range(
        min: 2,
        max: 9,
        notInRangeMessage: "Le nombre de places doit être entre {{ min }} et {{ max }}."
    )]
    private ?int $number_of_places = null;

    #[ORM\Column]
    #[Assert\NotNull(message: "Le type de boîte de vitesses est obligatoire.")]
    private ?bool $manual_gearbox = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getMonthlyPrice(): ?float
    {
        return $this->monthly_price;
    }

    public function setMonthlyPrice(float $monthly_price): static
    {
        $this->monthly_price = $monthly_price;

        return $this;
    }

    public function getDailyPrice(): ?float
    {
        return $this->daily_price;
    }

    public function setDailyPrice(float $daily_price): static
    {
        $this->daily_price = $daily_price;

        return $this;
    }

    public function getNumberOfPlaces(): ?int
    {
        return $this->number_of_places;
    }

    public function setNumberOfPlaces(int $number_of_places): static
    {
        $this->number_of_places = $number_of_places;

        return $this;
    }

    public function isManualGearbox(): ?bool
    {
        return $this->manual_gearbox;
    }

    public function setManualGearbox(bool $manual_gearbox): static
    {
        $this->manual_gearbox = $manual_gearbox;

        return $this;
    }
}
