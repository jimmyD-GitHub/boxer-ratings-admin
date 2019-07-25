<?php

namespace App\Repository;

use App\Entity\P4pRating;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method P4pRating|null find($id, $lockMode = null, $lockVersion = null)
 * @method P4pRating|null findOneBy(array $criteria, array $orderBy = null)
 * @method P4pRating[]    findAll()
 * @method P4pRating[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class P4pRatingRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, P4pRating::class);
    }

    // /**
    //  * @return P4pRating[] Returns an array of P4pRating objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?P4pRating
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
