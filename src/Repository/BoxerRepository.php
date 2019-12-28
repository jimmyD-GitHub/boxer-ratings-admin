<?php

namespace App\Repository;

use App\Entity\Boxer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry as RegistryInterface;

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
}
