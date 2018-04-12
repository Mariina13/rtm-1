<?php

namespace App\Repository;

use App\Entity\Utilisateurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class UtilisateursRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Utilisateurs::class);
    }
    

    public function ajouterHeureConnexion($objetConnection, $user)
    {
        $requeteSQL =
<<<CODESQL
UPDATE utilisateurs 
SET heure_connexion = NOW()
WHERE user =:user


CODESQL;
        // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#list-of-parameters-conversion
        $objetStatement = $objetConnection->prepare($requeteSQL);
        $objetStatement->execute([":user"=> $user ]);

        return $objetStatement;
    }
    public function ajouterHeureDeconnexion($objetConnection, $user)
    {
        $requeteSQL =
<<<CODESQL
UPDATE utilisateurs 
SET heure_deconnexion = NOW()
WHERE user =:user


CODESQL;
        // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#list-of-parameters-conversion
        $objetStatement = $objetConnection->prepare($requeteSQL);
        $objetStatement->execute([":user"=> $user ]);

        return $objetStatement;
    }

    public function compterLigneUtilisateurs ($objetConnection,$id) 
    {
        $requeteSQL = 
<<<CODESQL

SELECT COUNT(*) AS nbLigne FROM utilisateurs
WHERE id = :id
CODESQL;

        
        $tabResultat = $objetConnection->prepare($requeteSQL);
        $tabResultat->execute([":id" => $id]);

        $nbLigne = 0;
       
     foreach($tabResultat as $tabUtilisateurs)
    {
        // VA ME FOURNIR LA VALEUR DANS LA VARIABLE $nbLigne
        // extract($tabUtilisateurs);
        
        $nbLigne = $tabUtilisateurs["nbLigne"];
    }

        return $nbLigne;
    }
    public function LireListeUtilisateurs($objetConnection)
    {
        $requeteSQL =
<<<CODESQL
SELECT *
FROM utilisateurs
CODESQL;

        // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#list-of-parameters-conversion
        $objetStatement = $objetConnection->prepare($requeteSQL);
        $objetStatement->execute([]);

        return $objetStatement;

    }
    public function LireListeUser($objetConnection,$id)
    {
        $requeteSQL =
<<<CODESQL
SELECT *
FROM utilisateurs
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
        return $this->createQueryBuilder('u')
            ->where('u.something = :value')->setParameter('value', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
