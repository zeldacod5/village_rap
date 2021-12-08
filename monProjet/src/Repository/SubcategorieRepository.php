<?php

namespace App\Repository;

use App\Entity\Subcategorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Subcategorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Subcategorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Subcategorie[]    findAll()
 * @method Subcategorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubcategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Subcategorie::class);
    }

    // /**
    //  * @return Subcategorie[] Returns an array of Subcategorie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Subcategorie
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
