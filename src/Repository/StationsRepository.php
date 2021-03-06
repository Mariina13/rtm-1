<?php

namespace App\Repository;

use App\Entity\Stations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class StationsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Stations::class);
    }

    public function afficherNomBornesIp($objetConnection, $sigep)
    {
        $requeteSQL =
        
<<<CODESQL
SELECT *
FROM stations
WHERE sigep IN($sigep)
CODESQL;

        // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#list-of-parameters-conversion
        $objetStatement = $objetConnection->prepare($requeteSQL);
        $objetStatement->execute(["sigep"=>$sigep]);

return $objetStatement;

    }
    public function afficherNomBornesRadio($objetConnection, $sigep)
    {
        $requeteSQL =
<<<CODESQL
SELECT *
FROM stations
WHERE sigep IN($sigep)
CODESQL;

        // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#list-of-parameters-conversion
        $objetStatement = $objetConnection->prepare($requeteSQL);
        $objetStatement->execute(["sigep"=>$sigep]);

return $objetStatement;

    }
    public function afficherNomBornesGeze($objetConnection, $sigep)
    {

        $requeteSQL =
<<<CODESQL
SELECT *
FROM stations
WHERE sigep IN($sigep)
CODESQL;

        // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#list-of-parameters-conversion
        $objetStatement = $objetConnection->prepare($requeteSQL);
        $objetStatement->execute(["sigep"=>$sigep]);

return $objetStatement;

    }

    public function afficherNomStation($objetConnection, $sigep)
    {

        $requeteSQL =
<<<CODESQL
SELECT *
FROM stations
WHERE id AND sigep IN($sigep)


CODESQL;

        // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#list-of-parameters-conversion
        $objetStatement = $objetConnection->prepare($requeteSQL);
        $objetStatement->execute(["sigep" => $sigep ]);

return $objetStatement;

    }
    public function afficherNom($objetConnection,$id)
    {

        $requeteSQL =
<<<CODESQL
SELECT *
FROM stations
WHERE id IN($id)


CODESQL;

        // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#list-of-parameters-conversion
        $objetStatement = $objetConnection->prepare($requeteSQL);
        $objetStatement->execute([ "id" => $id]);

return $objetStatement;

    }


    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('s')
            ->where('s.something = :value')->setParameter('value', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
