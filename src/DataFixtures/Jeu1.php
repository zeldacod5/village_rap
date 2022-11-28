<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Jeu1 extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $produit1 = new Product();
        $produit1->setName("MC SOLAAR - Cinquième As");
        $produit1->setLongLib("Album référence de MC Solaar");
        $manager->persist($produit1);

        $manager->flush();
    }
}
