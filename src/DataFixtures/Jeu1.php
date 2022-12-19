<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Product;
use App\Entity\Category;
use App\Entity\Subcategory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class Jeu1 extends Fixture
{
    private $hasher;

    public function __construct(UserPasswordHasherInterface $h) {
        $this->hasher = $h;
    }


    public function load(ObjectManager $manager): void
    {

        $u1 = new User();
        $u1->setEmail("toto@gmail.com");
        $u1->setRoles(["ROLE_USER"]);
        $u1->setPassword($this->hasher->hashPassword($u1, "toto"));
        $manager->persist($u1);

        $u2 = new User();
        $u2->setEmail("admin@gmail.com");
        $u2->setRoles(["ROLE_ADMIN"]);
        $u2->setPassword($this->hasher->hashPassword($u2, "admin"));
        $manager->persist($u2);


        $cat1 = new Category();
        $cat1->setName("RAP Français");
        $cat1->setPicture("rapfr.jpg");
        $manager->persist($cat1);

        $cat2 = new Category();
        $cat2->setName("RAP Américain");
        $cat2->setPicture("rapus.jpeg");
        $manager->persist($cat2);



        $souscat1 = new Subcategory();
        $souscat1->setName("Old School");
        $manager->persist($souscat1);
        $souscat1->setCategory($cat1);

        $souscat2 = new Subcategory();
        $souscat2->setName("Old School");
        $manager->persist($souscat2);
        $souscat2->setCategory($cat2);



        $souscat4 = new Subcategory();
        $souscat4->setName("New School");
        $manager->persist($souscat4);
        $souscat4->setCategory($cat1);

        $souscat5 = new Subcategory();
        $souscat5->setName("New School");
        $manager->persist($souscat5);
        $souscat5->setCategory($cat2);


        $produit1 = new Product();
        $produit1->setName("Cinquième As");
        $produit1->setArtistname("MC SOLAAR");
        $produit1->setLongLib("Album référence de MC Solaar");
        $produit1->setShortLib("sortie le 13 mars 2001..");
        $produit1->setPrice(28);
        $produit1->setPicture("solaarmc.jpg");
        $manager->persist($produit1);
        $produit1->setSubcategory($souscat1);

        $produit2 = new Product();
        $produit2->setName("Memoria");
        $produit2->setArtistname("JAZZY BAZZ");
        $produit2->setLongLib("Troisième album de Jazzy Bazz");
        $produit2->setShortLib("sortie le 21 janvier 2022..");
        $produit2->setPrice(19,99);
        $produit2->setPicture("memoria.jpg");
        $manager->persist($produit2);
        $produit2->setSubcategory($souscat4);

        $produit3 = new Product();
        $produit3->setName("L'étrange Histoire de Mr.Anderson");
        $produit3->setArtistname("LAYLOW");
        $produit3->setLongLib("Deuxième album studio du rappeur!");
        $produit3->setShortLib("sortie le 16 juillet 2021..");
        $produit3->setPrice(19,99);
        $produit3->setPicture("laylow3.jpg");
        $manager->persist($produit3);
        $produit3->setSubcategory($souscat4);

        $produit4 = new Product();
        $produit4->setName("Apaches");
        $produit4->setArtistname("SAMEER AHMAD");
        $produit4->setLongLib("Rappeur de Montpellier");
        $produit4->setShortLib("sortie le 12 juin 2019..");
        $produit4->setPrice(22);
        $produit4->setPicture("ahmad.jpg");
        $manager->persist($produit4);
        $produit4->setSubcategory($souscat4);

        $produit5 = new Product();
        $produit5->setName("Opéra Puccino");
        $produit5->setArtistname("OXMO PUCCINO");
        $produit5->setLongLib("Deuxième album studio du rappeur!");
        $produit5->setShortLib("sortie le 28 avril 1998..");
        $produit5->setPrice(30);
        $produit5->setPicture("operapuccino.jpg");
        $manager->persist($produit5);
        $produit5->setSubcategory($souscat1);

        $produit6 = new Product();
        $produit6->setName("Le combat continue");
        $produit6->setArtistname("IDEAL J");
        $produit6->setLongLib("Album emblèmatique, les débuts du rappeur Kery James");
        $produit6->setShortLib("sortie le 26 octobre 1998..");
        $produit6->setPrice(20);
        $produit6->setPicture("idealj.jpg");
        $manager->persist($produit6);
        $produit6->setSubcategory($souscat1);

        $produit7 = new Product();
        $produit7->setName("L'école du micro d'argent");
        $produit7->setArtistname("IAM");
        $produit7->setLongLib("Album mythique du groupe IAM!");
        $produit7->setShortLib("sortie le 18 mars 1997..");
        $produit7->setPrice(28);
        $produit7->setPicture("iam1.jpg");
        $manager->persist($produit7);
        $produit7->setSubcategory($souscat1);

        $produit8 = new Product();
        $produit8->setName("Mauvais oeil");
        $produit8->setArtistname("LUNATIC");
        $produit8->setLongLib("Album des deux lunatics, Booba Ali");
        $produit8->setShortLib("sortie le 24 octobre 2000..");
        $produit8->setPrice(22);
        $produit8->setPicture("lunatic.jpg");
        $manager->persist($produit8);
        $produit8->setSubcategory($souscat1);

        $produit9 = new Product();
        $produit9->setName("The Massacre");
        $produit9->setArtistname("50 CENT");
        $produit9->setLongLib("Le massacre mec");
        $produit9->setShortLib("sortie le 3 mars 2005 ");
        $produit9->setPrice(19,99);
        $produit9->setPicture("50cent2.jpg");
        $manager->persist($produit9);
        $produit9->setSubcategory($souscat2);

        $produit10 = new Product();
        $produit10->setName("The Eminem Show");
        $produit10->setArtistname("EMINEM");
        $produit10->setLongLib("Album de dingue des années 2000");
        $produit10->setShortLib("sortie le 26 mai 2001..");
        $produit10->setPrice(19,99);
        $produit10->setPicture("eminemshow.jpg");
        $manager->persist($produit10);
        $produit10->setSubcategory($souscat2);

        $produit11 = new Product();
        $produit11->setName("Ready to Die");
        $produit11->setArtistname("NOTORIOUS BIG");
        $produit11->setLongLib("La c'est nimp..");
        $produit11->setShortLib("sortie le 13 septembre 1994");
        $produit11->setPrice(25);
        $produit11->setPicture("readytodie.jpg");
        $manager->persist($produit11);
        $produit11->setSubcategory($souscat2);

        $produit12 = new Product();
        $produit12->setName("Good Kid, M.A.A.D. City");
        $produit12->setArtistname("KENDRICK LAMAR");
        $produit12->setLongLib("La c'est reouf..");
        $produit12->setShortLib("sortie le 22 octobre 2012");
        $produit12->setPrice(19,99);
        $produit12->setPicture("kendrick1.jpg");
        $manager->persist($produit12);
        $produit12->setSubcategory($souscat5);

        $produit13 = new Product();
        $produit13->setName("Damn");
        $produit13->setArtistname("KENDRICK LAMAR");
        $produit13->setLongLib("La c'est relou même.");
        $produit13->setShortLib("sortie le 14 avril 2017..");
        $produit13->setPrice(26);
        $produit13->setPicture("kendrick2.jpg");
        $manager->persist($produit13);
        $produit13->setSubcategory($souscat5);

        $produit14 = new Product();
        $produit14->setName("Nostalgia+");
        $produit14->setArtistname("GREEN MONTANA");
        $produit14->setLongLib("Dernier album de GREEN MONTAIN dans les backs !");
        $produit14->setShortLib("sortie le 15 avril 2022..");
        $produit14->setPrice(22);
        $produit14->setPicture("greenmontana.jpg");
        $manager->persist($produit14);
        $produit14->setSubcategory($souscat4);

        $produit15 = new Product();
        $produit15->setName("RIYAD SADIO");
        $produit15->setArtistname("FREEZE CORLEONE & ASHE 22");
        $produit15->setLongLib("Sortez les fers et les cagoules ...");
        $produit15->setShortLib("sortie le 4 mars 2022");
        $produit15->setPrice(35);
        $produit15->setPicture("riyadsadio2.jpg");
        $manager->persist($produit15);
        $produit15->setSubcategory($souscat4);

        $produit16 = new Product();
        $produit16->setName("NEPTUNE TERMINUS");
        $produit16->setArtistname("YOUSSOUPHA");
        $produit16->setLongLib("Sixième album studio du rappeur!");
        $produit16->setShortLib("sortie le 19 mars 2021");
        $produit16->setPrice(25);
        $produit16->setPicture("neptune.jpg");
        $manager->persist($produit16);
        $produit16->setSubcategory($souscat4);

        $produit17 = new Product();
        $produit17->setName("Qu'est ce qui fait marcher les sages?");
        $produit17->setArtistname("LES SAGES POETES DE LA RUE");
        $produit17->setLongLib("Zoxea / Dany Dan / Melopheelo");
        $produit17->setShortLib("sortie le 15 février 1995");
        $produit17->setPrice(35);
        $produit17->setPicture("sages.jpg");
        $manager->persist($produit17);
        $produit17->setSubcategory($souscat1);

        $produit18 = new Product();
        $produit18->setName("Scarifications");
        $produit18->setArtistname("ABD-AL-MALIK");
        $produit18->setLongLib("Album incroyable");
        $produit18->setShortLib("sortie le 6 novembre 2015");
        $produit18->setPrice(25);
        $produit18->setPicture("Scarifications.jpg");
        $manager->persist($produit18);
        $produit18->setSubcategory($souscat4);

        $produit19 = new Product();
        $produit19->setName("Gibraltar");
        $produit19->setArtistname("ABD AL MALIK");
        $produit19->setLongLib("Pas de lorem pour Abd");
        $produit19->setShortLib("sortie le 12 juin 2006");
        $produit19->setPrice(28);
        $produit19->setPicture("Gibraltar.jpg");
        $manager->persist($produit19);
        $produit19->setSubcategory($souscat1);

        $produit20 = new Product();
        $produit20->setName("Effendi");
        $produit20->setArtistname("SAMEER AHMAD");
        $produit20->setLongLib("Faites la découverte de l'univers");
        $produit20->setShortLib("sortie le 10 décembre 2021");
        $produit20->setPrice(31);
        $produit20->setPicture("effendi.jpg");
        $manager->persist($produit20);
        $produit20->setSubcategory($souscat4);

        $produit21 = new Product();
        $produit21->setName("Château Rouge");
        $produit21->setArtistname("ABD AL MALIK");
        $produit21->setLongLib("Pas de lorem pour Abd");
        $produit21->setShortLib("sortie le 8 novembre 2010");
        $produit21->setPrice(28);
        $produit21->setPicture("chateaurouge.jpg");
        $manager->persist($produit21);
        $produit21->setSubcategory($souscat1);

        $manager->flush();
    }
}
