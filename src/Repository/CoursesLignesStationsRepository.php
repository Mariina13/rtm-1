<?php

namespace App\Repository;

use App\Entity\CoursesLignesStations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class CoursesLignesStationsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CoursesLignesStations::class);
    }
    public function lireHoraire($objetConnection,$idStations)
    {
        $requeteSQL =
<<<CODESQL

SELECT *
FROM courses_lignes_stations
WHERE id_stations = :id_stations

CODESQL;
        // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#list-of-parameters-conversion
        $objetStatement = $objetConnection->prepare($requeteSQL);
        $objetStatement->execute(["id_stations" => $idStations]);

        return $objetStatement;

    }
    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('c')
            ->where('c.something = :value')->setParameter('value', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
