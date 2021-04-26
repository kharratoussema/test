<?php

namespace App\Repository;

use App\Entity\Pointeuse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Pointeuse|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pointeuse|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pointeuse[]    findAll()
 * @method Pointeuse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PointeuseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pointeuse::class);
    }

    // /**
    //  * @return Pointeuse[] Returns an array of Pointeuse objects
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
    public function findOneBySomeField($value): ?Pointeuse
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
