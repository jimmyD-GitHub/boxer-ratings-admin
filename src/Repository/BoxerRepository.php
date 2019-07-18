<?php

namespace App\Repository;

use App\Entity\Boxer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Boxer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Boxer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Boxer[]    findAll()
 * @method Boxer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BoxerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Boxer::class);
    }

    // /**
    //  * @return Boxer[] Returns an array of Boxer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Boxer
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
