<?php

namespace App\Repository;

use App\Entity\TableOperationsUtilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class TableOperationsUtilisateurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TableOperationsUtilisateur::class);
    }
    public function listeMessage($objetConnection,$id)
    {
        $requeteSQL =
<<<CODESQL
SELECT COUNT(*) AS nbLigne
FROM table_operations_utilisateur
WHERE id = :id 
CODESQL;

        // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#list-of-parameters-conversion
        $tabResultat = $objetConnection->prepare($requeteSQL);
        $tabResultat->execute(["id"=> $id ]);

        $nbLigne = 0;
       
         foreach($tabResultat as $tabMessage)
        {
        // VA ME FOURNIR LA VALEUR DANS LA VARIABLE $nbLigne
    
            $nbLigne = $tabMessage["nbLigne"];
        }

         return $nbLigne;
    }
    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('t')
            ->where('t.something = :value')->setParameter('value', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
