<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EntiteTest|null find($id, $lockMode = null, $lockVersion = null)
 * @method EntiteTest|null findOneBy(array $criteria, array $orderBy = null)
 * @method EntiteTest[]    findAll()
 * @method EntiteTest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }


    public function totalUsersInscrits()
    {
        return $this->createQueryBuilder('u')
                ->select('COUNT(u)')
                ->getQuery()
                ->getSingleScalarResult();
    }









}
