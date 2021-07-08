<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TrendRepository;
use DateTime;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Tlc\ReportBundle\Entity\BaseEntity;

#[ORM\Entity(repositoryClass: TrendRepository::class)]
#[ORM\Table(schema: "trend", name: "trend", options: ["comment" => "Тендеции"])]
#[
    ApiResource(
        collectionOperations: ["get", "post"],
        itemOperations: ["get", "put", "delete"],
        normalizationContext: ["groups" => ["trend:read"]],
        denormalizationContext: ["groups" => ["trend:write"], "disable_type_enforcement" => true]
    )
]
#[ORM\HasLifecycleCallbacks]
class Trend
{
    protected DateTime $drec;

    #[ORM\Id]
    #[ORM\Column(name: "drec", type: "string", options: ["comment" => "Время изменения значения тренда"])]
    #[Groups(["trend:read"])]
    #[ApiProperty(identifier: true)]
    protected $drecTimestampKey;
    
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Attribute::class, inversedBy: "trends")]
    #[ORM\JoinColumn(nullable: false)]
    private $attribute;

    #[ORM\Column(type: "smallint", options: ["comment" => "Значение"])]
    private $value;


    public function getDrecTimestampKey(): ?int
    {
        return strtotime($this->drec->format(DATE_ATOM));
    }

    public function getDrec(): DateTime
    {
        return $this->drec;
    }

    public function setDrec(\DateTimeInterface $drec): self
    {
        $this->drec = $drec;

        return $this;
    }

    #[Groups(["trend:read"])]
    public function getStart(): ?string
    {
        return $this->drec->format(BaseEntity::DATETIME_FOR_FRONT);
    }

    #[Groups(["trend:read"])]
    public function getStartTime(): ?string
    {
        return $this->drec->format(BaseEntity::TIME_FOR_FRONT);
    }

    public function getAttribute(): ?Attribute
    {
        return $this->attribute;
    }

    public function setAttribute(?Attribute $attribute): self
    {
        $this->attribute = $attribute;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }

    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function syncDrecTodrecTimestampKey(LifecycleEventArgs $event)
    {
        $entityManager = $event->getEntityManager();
        $connection = $entityManager->getConnection();
        $platform = $connection->getDatabasePlatform();
        $this->drecTimestampKey = $this->drec->format($platform->getDateTimeFormatString());
    }

    #[ORM\PostLoad]
    public function syncDrecTimestampKeyToDrec(LifecycleEventArgs $event)
    {
        $entityManager = $event->getEntityManager();
        $connection = $entityManager->getConnection();
        $platform = $connection->getDatabasePlatform();
        $this->drec = DateTime::createFromFormat($platform->getDateTimeTzFormatString(), $this->drecTimestampKey) ?:
            \DateTime::createFromFormat($platform->getDateTimeFormatString(), $this->drecTimestampKey) ?:
            \DateTime::createFromFormat(BaseEntity::DATE_SECOND_TIMEZONE_FORMAT_DB, $this->drecTimestampKey) ?:
            \DateTime::createFromFormat(BaseEntity::DATE_SECOND_FORMAT_DB, $this->drecTimestampKey);
    }
}
