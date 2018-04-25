<?php

namespace App\Repository;

use App\Entity\CityOrganizationTag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CityOrganizationTag|null find($id, $lockMode = null, $lockVersion = null)
 * @method CityOrganizationTag|null findOneBy(array $criteria, array $orderBy = null)
 * @method CityOrganizationTag[]    findAll()
 * @method CityOrganizationTag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CityOrganizationTagRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CityOrganizationTag::class);
    }

//    /**
//     * @return CityOrganizationTag[] Returns an array of CityOrganizationTag objects
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
    public function findOneBySomeField($value): ?CityOrganizationTag
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
