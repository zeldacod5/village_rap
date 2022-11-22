<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Jeu1 extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $p1 = new Product();
        $p1->setName("Guitares");
        $manager->persist($p1);

        $manager->flush();
    }
}
