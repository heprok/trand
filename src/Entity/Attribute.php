<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AttributeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AttributeRepository::class)]
#[ORM\Table(schema: "trend", name: "attribute", options: ["comment" => "Свойства"])]
#[
    ApiResource(
        collectionOperations: ["get", "post"],
        itemOperations: ["get", "put", "delete"],
        normalizationContext: ["groups" => ["atrribute:read"]],
        denormalizationContext: ["groups" => ["atrribute:write"], "disable_type_enforcement" => true]
    )
]
class Attribute
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\Column(type: "string", length: 128)]
    private $name;

    #[ORM\OneToMany(targetEntity: Trend::class, mappedBy: "attribute")]
    private $trends;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->trends = new ArrayCollection();
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
     * @return Collection|Trend[]
     */
    public function getTrends(): Collection
    {
        return $this->trends;
    }

    public function addTrend(Trend $trend): self
    {
        if (!$this->trends->contains($trend)) {
            $this->trends[] = $trend;
            $trend->setAttribute($this);
        }

        return $this;
    }

    public function removeTrend(Trend $trend): self
    {
        if ($this->trends->removeElement($trend)) {
            // set the owning side to null (unless already changed)
            if ($trend->getAttribute() === $this) {
                $trend->setAttribute(null);
            }
        }

        return $this;
    }
}
