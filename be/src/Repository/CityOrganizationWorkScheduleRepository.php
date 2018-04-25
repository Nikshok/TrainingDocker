<?php

namespace App\Repository;

use App\Entity\CityOrganizationWorkSchedule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CityOrganizationWorkSchedule|null find($id, $lockMode = null, $lockVersion = null)
 * @method CityOrganizationWorkSchedule|null findOneBy(array $criteria, array $orderBy = null)
 * @method CityOrganizationWorkSchedule[]    findAll()
 * @method CityOrganizationWorkSchedule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CityOrganizationWorkScheduleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CityOrganizationWorkSchedule::class);
    }

//    /**
//     * @return CityOrganizationWorkSchedule[] Returns an array of CityOrganizationWorkSchedule objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CityOrganizationWorkSchedule
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
