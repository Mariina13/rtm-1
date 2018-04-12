<?php

namespace App\Repository;

use App\Entity\ParametrageBornes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ParametrageBornesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ParametrageBornes::class);
    }
    public function informations($objetConnection,$id)
    {
        $requeteSQL =
<<<CODESQL
SELECT *
FROM parametrage_bornes
WHERE id = :id
CODESQL;

        // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#list-of-parameters-conversion
        $objetStatement = $objetConnection->prepare($requeteSQL);
        $objetStatement->execute([":id" => $id]);

        return $objetStatement;

    }
    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('p')
            ->where('p.something = :value')->setParameter('value', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
