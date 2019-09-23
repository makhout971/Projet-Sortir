<?php

namespace App\Repository;

use App\Entity\EntiteTest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EntiteTest|null find($id, $lockMode = null, $lockVersion = null)
 * @method EntiteTest|null findOneBy(array $criteria, array $orderBy = null)
 * @method EntiteTest[]    findAll()
 * @method EntiteTest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntiteTestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EntiteTest::class);
    }

    // /**
    //  * @return EntiteTest[] Returns an array of EntiteTest objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EntiteTest
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
