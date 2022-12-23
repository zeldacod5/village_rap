<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Product;
use App\Entity\Category;
use App\Entity\Subcategory;
use App\Entity\Label;
use App\Entity\Artist;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\Collection;
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



        $lab1 = new Label();
        $lab1->setName("Drill");
        $lab1->setPicture("drill.jpg");
        $lab1->setDescription("");
        $manager->persist($lab1);
        

        $lab2 = new Label();
        $lab2->setName("Trap");
        $lab2->setPicture("trap.jpeg");
        $lab2->setDescription("");
        $manager->persist($lab2);

        $lab3 = new Label();
        $lab3->setName("Jersey");
        $lab3->setPicture("jersey.jpg");
        $lab3->setDescription("");
        $manager->persist($lab3);

        $lab4 = new Label();
        $lab4->setName("BoomBap");
        $lab4->setPicture("boombap.jpg");
        $lab4->setDescription("");
        $manager->persist($lab4);

        $lab5 = new Label();
        $lab5->setName("Plug");
        $lab5->setPicture("plug.jpg");
        $lab5->setDescription("");
        $manager->persist($lab5);

        $lab6 = new Label();
        $lab6->setName("Cloud Rap");
        $lab6->setPicture("cloudrap.jpg");
        $lab6->setDescription("");
        $manager->persist($lab6);

        $lab7 = new Label();
        $lab7->setName("Conscient");
        $lab7->setPicture("conscient.jpg");
        $lab7->setDescription("");
        $manager->persist($lab7);

        $lab8 = new Label();
        $lab8->setName("Emo Rap");
        $lab8->setPicture("emorap.jpg");
        $lab8->setDescription("");
        $manager->persist($lab8);

        $lab9 = new Label();
        $lab9->setName("Frat");
        $lab9->setPicture("Frat.jpg");
        $lab9->setDescription("");
        $manager->persist($lab9);

        $lab10 = new Label();
        $lab10->setName("Gangsta Rap");
        $lab10->setPicture("gangstarap.jpg");
        $lab10->setDescription("");
        $manager->persist($lab10);

        $lab11 = new Label();
        $lab11->setName("Jazz Rap");
        $lab11->setPicture("jazzrap.jpg");
        $lab11->setDescription("");
        $manager->persist($lab11);

        $lab12 = new Label();
        $lab12->setName("US Rap");
        $lab12->setPicture("usrap.jpg");
        $lab12->setDescription("");
        $manager->persist($lab12);

        $lab13 = new Label();
        $lab13->setName("UK Rap");
        $lab13->setPicture("ukrap.jpg");
        $lab13->setDescription("");
        $manager->persist($lab13);

        $lab14 = new Label();
        $lab14->setName("FR Rap");
        $lab14->setPicture("frrap.jpg");
        $lab14->setDescription("");
        $manager->persist($lab14);

        $lab15 = new Label();
        $lab15->setName("Certified Diamond");
        $lab15->setPicture("diamond.jpg");
        $lab15->setDescription("");
        $manager->persist($lab15);

        $lab16 = new Label();
        $lab16->setName("Certified Gold");
        $lab16->setPicture("gold.jpg");
        $lab16->setDescription("");
        $manager->persist($lab16);

        $lab17 = new Label();
        $lab17->setName("New Generation");
        $lab17->setPicture("nawgen.jpg");
        $lab17->setDescription("");
        $manager->persist($lab17);

        $lab18 = new Label();
        $lab18->setName("Old School");
        $lab18->setPicture("oldschool.jpg");
        $lab18->setDescription("");
        $manager->persist($lab18);

        $lab19 = new Label();
        $lab19->setName("LowKey & Underground");
        $lab19->setPicture("lowkey.jpg");
        $lab19->setDescription("");
        $manager->persist($lab19);



        $cat1 = new Category();
        $cat1->setName("CAT N°1");
        $cat1->setPicture("...");
        $cat1->setDescription("...");
        $manager->persist($cat1);

        $souscat1 = new Subcategory();
        $souscat1->setName("SOUSCAT N°1");
        $souscat1->setPicture("...");
        $souscat1->setDescription("...");
        $manager->persist($souscat1);
        $souscat1->setCategory($cat1);



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
        $produit2->setSubcategory($souscat1);

        $produit3 = new Product();
        $produit3->setName("L'étrange Histoire de Mr.Anderson");
        $produit3->setArtistname("LAYLOW");
        $produit3->setLongLib("Deuxième album studio du rappeur!");
        $produit3->setShortLib("sortie le 16 juillet 2021..");
        $produit3->setPrice(19,99);
        $produit3->setPicture("laylow3.jpg");
        $manager->persist($produit3);
        $produit3->setSubcategory($souscat1);

        $produit4 = new Product();
        $produit4->setName("Apaches");
        $produit4->setArtistname("SAMEER AHMAD");
        $produit4->setLongLib("Rappeur de Montpellier");
        $produit4->setShortLib("sortie le 12 juin 2019..");
        $produit4->setPrice(22);
        $produit4->setPicture("ahmad.jpg");
        $manager->persist($produit4);
        $produit4->setSubcategory($souscat1);

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
        $produit9->setSubcategory($souscat1);

        $produit10 = new Product();
        $produit10->setName("The Eminem Show");
        $produit10->setArtistname("EMINEM");
        $produit10->setLongLib("Album de dingue des années 2000");
        $produit10->setShortLib("sortie le 26 mai 2001..");
        $produit10->setPrice(19,99);
        $produit10->setPicture("eminemshow.jpg");
        $manager->persist($produit10);
        $produit10->setSubcategory($souscat1);

        $produit11 = new Product();
        $produit11->setName("Ready to Die");
        $produit11->setArtistname("NOTORIOUS BIG");
        $produit11->setLongLib("La c'est nimp..");
        $produit11->setShortLib("sortie le 13 septembre 1994");
        $produit11->setPrice(25);
        $produit11->setPicture("readytodie.jpg");
        $manager->persist($produit11);
        $produit11->setSubcategory($souscat1);

        $produit12 = new Product();
        $produit12->setName("Good Kid, M.A.A.D. City");
        $produit12->setArtistname("KENDRICK LAMAR");
        $produit12->setLongLib("La c'est reouf..");
        $produit12->setShortLib("sortie le 22 octobre 2012");
        $produit12->setPrice(19,99);
        $produit12->setPicture("kendrick1.jpg");
        $manager->persist($produit12);
        $produit12->setSubcategory($souscat1);

        $produit13 = new Product();
        $produit13->setName("Damn");
        $produit13->setArtistname("KENDRICK LAMAR");
        $produit13->setLongLib("La c'est relou même.");
        $produit13->setShortLib("sortie le 14 avril 2017..");
        $produit13->setPrice(26);
        $produit13->setPicture("kendrick2.jpg");
        $manager->persist($produit13);
        $produit13->setSubcategory($souscat1);

        $produit14 = new Product();
        $produit14->setName("Nostalgia+");
        $produit14->setArtistname("GREEN MONTANA");
        $produit14->setLongLib("Dernier album de Green Montain dans les backs !");
        $produit14->setShortLib("sortie le 15 avril 2022..");
        $produit14->setPrice(22);
        $produit14->setPicture("greenmontana.jpg");
        $manager->persist($produit14);
        $produit14->setSubcategory($souscat1);

        $produit15 = new Product();
        $produit15->setName("RIYAD SADIO");
        $produit15->setArtistname("FREEZE CORLEONE & ASHE 22");
        $produit15->setLongLib("Sortez les fers et les cagoules ...");
        $produit15->setShortLib("sortie le 4 mars 2022");
        $produit15->setPrice(35);
        $produit15->setPicture("riyadsadio2.jpg");
        $manager->persist($produit15);
        $produit15->setSubcategory($souscat1);

        $produit16 = new Product();
        $produit16->setName("NEPTUNE TERMINUS");
        $produit16->setArtistname("YOUSSOUPHA");
        $produit16->setLongLib("Sixième album studio du rappeur!");
        $produit16->setShortLib("sortie le 19 mars 2021");
        $produit16->setPrice(25);
        $produit16->setPicture("neptune.jpg");
        $manager->persist($produit16);
        $produit16->setSubcategory($souscat1);

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
        $produit18->setArtistname("ABD AL MALIK");
        $produit18->setLongLib("Album incroyable");
        $produit18->setShortLib("sortie le 6 novembre 2015");
        $produit18->setPrice(25);
        $produit18->setPicture("Scarifications.jpg");
        $manager->persist($produit18);
        $produit18->setSubcategory($souscat1);

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
        $produit20->setSubcategory($souscat1);

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
