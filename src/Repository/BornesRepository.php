<?php

namespace App\Repository;

use App\Entity\Bornes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class BornesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Bornes::class);
    }

    public function LireListeBornesIp($objetConnection, $id)
    {
        $requeteSQL =
<<<CODESQL
SELECT *
FROM bornes
WHERE type_equipement = "1" AND id = :id
CODESQL;

        // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#list-of-parameters-conversion
        $objetStatement = $objetConnection->prepare($requeteSQL);
        $objetStatement->execute(["type_equipement" > "1","id" => $id]);

return $objetStatement;

    }
    public function LireListeBornesRadio($objetConnection, $id)
    {
        $requeteSQL =
<<<CODESQL
SELECT *
FROM bornes
WHERE type_equipement = "0" and id = :id
CODESQL;

        // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#list-of-parameters-conversion
        $objetStatement = $objetConnection->prepare($requeteSQL);
        $objetStatement->execute(["type_equipement" => "0" ,"id" => $id]);

return $objetStatement;

    }
    public function LireListeBornesGeze($objetConnection, $id)
    {
        $requeteSQL =
<<<CODESQL
SELECT *
FROM bornes
WHERE type_equipement = "2" and id = :id
CODESQL;

        // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#list-of-parameters-conversion
        $objetStatement = $objetConnection->prepare($requeteSQL);
        $objetStatement->execute(["type_equipement" => "2" ,"id" => $id]);

return $objetStatement;

    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('b')
            ->where('b.something = :value')->setParameter('value', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
