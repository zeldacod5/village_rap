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
        $cat1->setPicture("rapfr.jpg");
        $manager->persist($cat1);

        $cat2 = new Category();
        $cat2->setName("RAP Américain");
        $cat2->setPicture("rapus.jpeg");
        $manager->persist($cat2);

        $cat3 = new Category();
        $cat3->setName("RAP Espagnol");
        $cat3->setPicture("rapespagnol.jpeg");
        $manager->persist($cat3);









        $souscat1 = new Subcategory();
        $souscat1->setName("Old School");
        $manager->persist($souscat1);
        $souscat1->setCategory($cat1);

        $souscat2 = new Subcategory();
        $souscat2->setName("Old School");
        $manager->persist($souscat2);
        $souscat2->setCategory($cat2);

        $souscat3 = new Subcategory();
        $souscat3->setName("Old School");
        $manager->persist($souscat3);
        $souscat3->setCategory($cat3);




        $souscat4 = new Subcategory();
        $souscat4->setName("New School");
        $manager->persist($souscat4);
        $souscat4->setCategory($cat1);

        $souscat5 = new Subcategory();
        $souscat5->setName("New School");
        $manager->persist($souscat5);
        $souscat5->setCategory($cat2);

        $souscat6 = new Subcategory();
        $souscat6->setName("New School");
        $manager->persist($souscat6);
        $souscat6->setCategory($cat3);




        $produit1 = new Product();
        $produit1->setName("MC SOLAAR - Cinquième As");
        $produit1->setLongLib("Album référence de MC Solaar");
        $produit1->setPicture("solaarmc.jpg");
        // $produit1
        $manager->persist($produit1);
        $produit1->setSubcategory($souscat1);

        $produit2 = new Product();
        $produit2->setName("JAZZY BAZZ - Memoria");
        $produit2->setLongLib("Troisième album de Jazzy Bazz");
        $produit2->setPicture("memoria.jpg");
        $manager->persist($produit2);
        $produit2->setSubcategory($souscat4);

        $produit3 = new Product();
        $produit3->setName("LAYLOW - L'étrange Histoire de Mr.Anderson");
        $produit3->setLongLib("Deuxième album studio du rappeur!");
        $produit3->setPicture("laylow.jpeg");
        $manager->persist($produit3);
        $produit3->setSubcategory($souscat4);

        $produit4 = new Product();
        $produit4->setName("SAMEER AHMAD - Apaches");
        $produit4->setLongLib("Rappeur de Montpellier");
        $produit4->setPicture("ahmad.jpg");
        $manager->persist($produit4);
        $produit4->setSubcategory($souscat4);

        $produit5 = new Product();
        $produit5->setName("OXMO PUCCINO - Opéra Puccino");
        $produit5->setLongLib("Deuxième album studio du rappeur!");
        $produit5->setPicture("operapuccino.jpg");
        $manager->persist($produit5);
        $produit5->setSubcategory($souscat1);

        $produit6 = new Product();
        $produit6->setName("IDEAL J - Le combat continue");
        $produit6->setLongLib("Album emblèmatique, les débuts du rappeur Kery James");
        $produit6->setPicture("idealj.jpg");
        $manager->persist($produit6);
        $produit6->setSubcategory($souscat1);

        $produit7 = new Product();
        $produit7->setName("IAM - L'école du micro d'argent");
        $produit7->setLongLib("Album mythique du groupe IAM!");
        $produit7->setPicture("iam1.jpg");
        $manager->persist($produit7);
        $produit7->setSubcategory($souscat1);

        $produit8 = new Product();
        $produit8->setName("LUNATIC - Mauvais oeil");
        $produit8->setLongLib("Album des deux lunatics, Booba Ali");
        $produit8->setPicture("lunatic.jpg");
        $manager->persist($produit8);
        $produit8->setSubcategory($souscat1);



        $manager->flush();
    }
}
