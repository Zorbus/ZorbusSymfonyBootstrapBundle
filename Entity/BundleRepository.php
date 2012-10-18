<?php

namespace Zorbus\SymfonyBootstrapBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * BundleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BundleRepository extends EntityRepository
{
    public function getQueryBuilder()
    {
        return $this
            ->getEntityManager()
            ->getRepository('ZorbusSymfonyBootstrapBundle:Bundle')
            ->createQueryBuilder('b')
            ->where('b.is_enabled = 1')
            ->orderBy('b.name', 'asc');
    }
}
