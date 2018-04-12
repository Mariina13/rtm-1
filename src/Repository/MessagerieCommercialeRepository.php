<?php

namespace App\Repository;

use App\Entity\MessagerieCommerciale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class MessagerieCommercialeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MessagerieCommerciale::class);
     
    }

    public function listeMessage($objetConnection,$messageEnvoye,$id)
    {
        $requeteSQL =
<<<CODESQL
SELECT COUNT(*) AS nbLigne
FROM messagerie_commerciale
WHERE id = :id AND message_envoye = :messageEnvoye
CODESQL;

        // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#list-of-parameters-conversion
        $tabResultat = $objetConnection->prepare($requeteSQL);
        $tabResultat->execute(["id"=> $id , "messageEnvoye" => $messageEnvoye]);

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
        return $this->createQueryBuilder('m')
            ->where('m.something = :value')->setParameter('value', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
