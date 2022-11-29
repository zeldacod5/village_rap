<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use App\Entity\Subcategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Jeu1 extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $cat1 = new Category();
        $cat1->setName("RAP Français");
        $cat1->setPicture("image1.jpg");
        $manager->persist($cat1);


        $souscat1 = new Subcategory();
        $souscat1->setName("Drill");
        $manager->persist($souscat1);
        $souscat1->setCategory($cat1);

        $souscat2 = new Subcategory();
        $souscat2->setName("Drill 22");
        $manager->persist($souscat2);
        $souscat2->setCategory($cat1);



        $produit1 = new Product();
        $produit1->setName("MC SOLAAR - Cinquième As");
        $produit1->setLongLib("Album référence de MC Solaar");
        $manager->persist($produit1);
        $produit1->addSubcategory($souscat1);

        $manager->flush();
    }
}
