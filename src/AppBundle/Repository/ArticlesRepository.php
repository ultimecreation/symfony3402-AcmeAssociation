<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Category;
use Doctrine\ORM\EntityRepository;

class ArticlesRepository extends EntityRepository
{
    // public function findAllOrderedByName()
    // {
    //     return $this->getEntityManager()
    //         ->createQuery(
    //             'SELECT a FROM AppBundle:Articles a ORDER BY a.titre ASC'
    //         )
    //         ->getResult();
    // }
    // public function findAllOrderedByName()
    // {
    //     return $this->getEntityManager()
    //         ->createQuery(
    //             'SELECT c FROM AppBundle:Category cat ORDER BY c.name ASC'
    //         )
    //         ->getResult();
    // }
}
