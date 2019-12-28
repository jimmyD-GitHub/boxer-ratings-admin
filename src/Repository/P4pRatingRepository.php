<?php

namespace App\Repository;

use App\Entity\P4pRating;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry as RegistryInterface;

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
}
