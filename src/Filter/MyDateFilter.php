<?php

namespace App\Filter;

use ApiPlatform\Core\Bridge\Doctrine\Common\Filter\DateFilterInterface;
use ApiPlatform\Core\Bridge\Doctrine\Common\Filter\DateFilterTrait;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use Doctrine\DBAL\Types\Type as DBALType;
use Doctrine\ORM\QueryBuilder;
use DoctrineExtensions\Types\CarbonDateTimeTzType;

class MyDateFilter extends DateFilter
{    
    use DateFilterTrait;

    public const DOCTRINE_DATE_TYPES = [
            DBALType::DATE => true,
            DBALType::DATETIME => true,
            DBALType::DATETIMETZ => true,
            DBALType::TIME => true,
            DBALType::DATE_IMMUTABLE => true,
            DBALType::DATETIME_IMMUTABLE => true,
            DBALType::DATETIMETZ_IMMUTABLE => true,
            DBALType::TIME_IMMUTABLE => true,
            CarbonDateTimeTzType::CARBONDATETIMETZ => true,
    ];
}
