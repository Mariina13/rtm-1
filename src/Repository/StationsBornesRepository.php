<?php

namespace App\Repository;

use App\Entity\StationsBornes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class StationsBornesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StationsBornes::class);
    }
    public function AfficherStations($objetConnection)
    {

        $requeteSQL =
<<<CODESQL
SELECT *
FROM stations
WHERE id_stations

CODESQL;

        // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#list-of-parameters-conversion
        $objetStatement = $objetConnection->prepare($requeteSQL);
        $objetStatement->execute(["id_stations" => "ASC"]);

return $objetStatement;

    }

    public function afficherStationsBornes($objetConnection)
    {
        $requeteSQL =
<<<CODESQL
SELECT *
From stations
INNER JOIN stations_bornes On stations.id_stations = stations_bornes.id_stations


CODESQL;

$objetStatement = $objetConnection->prepare($requeteSQL);
$objetStatement->execute(["id_stations" => "ASC"]);

    }
    public function afficherBornes($objetConnection)
    {
        $requeteSQL =
<<<CODESQL
SELECT *
From stations_bornes
INNER JOIN bornes On stations_bornes.id_bornes = bornes.id_bornes


CODESQL;

$objetStatement = $objetConnection->prepare($requeteSQL);
$objetStatement->execute(["id_bornes" => "ASC"]);
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
