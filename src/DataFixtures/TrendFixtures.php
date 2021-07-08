<?php

namespace App\DataFixtures;

use App\Entity\Trend;
use App\Entity\Attribute;
use App\Entity\TrendSource;
use App\Entity\TrendType;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TrendFixtures extends Fixture implements DependentFixtureInterface
{
    const COUNT_TREND = 10000;

    public function load(ObjectManager $manager)
    {
        $arr_attribute = $manager->getRepository(Attribute::class)->findAll();

        $randomDatesTimestamp = AppFixtures::getRandomDatetime(self::COUNT_TREND);

        for ($i=0; $i < self::COUNT_TREND; $i++) { 
            $trend = new Trend();

            $drec = new DateTime();
            $drec->setTimestamp($randomDatesTimestamp[$i]);
            
            $trend->setDrec($drec);
            $trend->setValue(rand(0, 400));
            $trend->setAttribute($arr_attribute[array_rand($arr_attribute)]);
            
            $manager->persist($trend);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AttributeFixtures::class
        ];
    }
}
