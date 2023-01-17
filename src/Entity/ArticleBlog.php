<?php

namespace App\Entity;

use App\Repository\ArticleBlogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleBlogRepository::class)]
class ArticleBlog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $interview = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInterview(): ?string
    {
        return $this->interview;
    }

    public function setInterview(string $interview): self
    {
        $this->interview = $interview;

        return $this;
    }
}
