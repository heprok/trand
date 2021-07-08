<?php

namespace App\DataFixtures;

use App\Entity\Attribute;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AttributeFixtures extends Fixture
{
    const COUNT_ATTRIBUTE = 20;

    public function load(ObjectManager $manager)
    {
        $arr_name = [
            'Акселерометр',
            'Гироскоп',
            'Геомагнитный датчик',
            'Датчик приближения',
            'Датчик освещенности',
            'Датчик Холла',
            'Барометр',
            'Термометр',
            'Датчик влажности',
            'Шагомер',
            'Сканер отпечатков пальцев',
            'Сканер сетчатки глаза',
            'Датчик сердцебиения',
            'Датчик насыщения крови кислородом SpO2',
            'Дозиметр',
            'Вспомогательные датчики',
        ];

        for ($i = 0; $i < self::COUNT_ATTRIBUTE; $i++) {
            $name = $arr_name[$i] ?? "Атрибут $i";
            $provder = new Attribute($name);
            $manager->persist($provder);
        }

        $manager->flush();
    }
}
