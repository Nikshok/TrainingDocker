<?php

namespace App\Repository;

use App\Entity\CityOrganization;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CityOrganization|null find($id, $lockMode = null, $lockVersion = null)
 * @method CityOrganization|null findOneBy(array $criteria, array $orderBy = null)
 * @method CityOrganization[]    findAll()
 * @method CityOrganization[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CityOrganizationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CityOrganization::class);
    }

//    /**
//     * @return CityOrganization[] Returns an array of CityOrganization objects
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
    public function findOneBySomeField($value): ?CityOrganization
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
