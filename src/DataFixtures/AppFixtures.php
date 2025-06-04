<?php

namespace App\DataFixtures;

use App\Factory\CarFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        CarFactory::createMany(10); // Creates 10 Car entities with random data

        $manager->flush();
    }
}
