<?php

namespace App\Repository;

use App\Entity\ReponseUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ReponseUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReponseUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReponseUser[]    findAll()
 * @method ReponseUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReponseUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReponseUser::class);
    }

    // /**
    //  * @return ReponseUser[] Returns an array of ReponseUser objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ReponseUser
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
