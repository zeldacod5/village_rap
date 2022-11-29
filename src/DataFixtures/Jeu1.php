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

        $cat2 = new Category();
        $cat2->setName("RAP US");
        $cat2->setPicture("image2.jpg");
        $manager->persist($cat2);

        $cat3 = new Category();
        $cat3->setName("RAP UK");
        $cat3->setPicture("image3.jpg");
        $manager->persist($cat3);

        $souscat1 = new Subcategory();
        $souscat1->setName("Drill");
        $manager->persist($souscat1);
        $souscat1->setCategory($cat3);

        $souscat2 = new Subcategory();
        $souscat2->setName("Topliners");
        $manager->persist($souscat2);
        $souscat2->setCategory($cat1);

        $souscat3 = new Subcategory();
        $souscat3->setName("Jersey");
        $manager->persist($souscat3);
        $souscat3->setCategory($cat2);

        $souscat4 = new Subcategory();
        $souscat4->setName("Plug");
        $manager->persist($souscat4);
        $souscat4->setCategory($cat1);

        $souscat5 = new Subcategory();
        $souscat5->setName("BoomBap");
        $manager->persist($souscat5);
        $souscat5->setCategory($cat2);

        $souscat6 = new Subcategory();
        $souscat6->setName("Trap");
        $manager->persist($souscat6);
        $souscat6->setCategory($cat3);


        $produit1 = new Product();
        $produit1->setName("MC SOLAAR - Cinquième As");
        $produit1->setLongLib("Album référence de MC Solaar");
        $manager->persist($produit1);
        $produit1->addSubcategory($souscat5);

        $produit2 = new Product();
        $produit2->setName("GREEN MONTANA - NOSTALGIA+");
        $produit2->setLongLib("Dernier album de GREEN MONTAIN dans les backs !");
        $manager->persist($produit2);
        $produit2->addSubcategory($souscat2);

        $produit3 = new Product();
        $produit3->setName("Freeze Corleone & ASHE 22 - RIYAD SADIO");
        $produit3->setLongLib("Sortez les fers et les cagoules ...");
        $manager->persist($produit3);
        $produit3->addSubcategory($souscat1);

        $manager->flush();
    }
}
