<?php

namespace Zorbus\SymfonyBootstrapBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ProjectRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProjectRepository extends EntityRepository
{
    public function getNextToProcess()
    {
        try {
            $project = $this
                ->getEntityManager()
                ->createQuery('SELECT p from ZorbusSymfonyBootstrapBundle:Project p LEFT JOIN p.bundles b LEFT JOIN p.repositories r WHERE p.processed = :processed ORDER BY p.created_at DESC' )
                ->setParameter('processed', false)
                ->setMaxResults(1)
                ->getSingleResult();
        }catch (\Doctrine\ORM\NoResultException $e)
        {
            $project = null;
        }

        return $project;
    }
    public function getProcessed()
    {
        return $this
                ->getEntityManager()
                ->createQuery('SELECT p from ZorbusSymfonyBootstrapBundle:Project p LEFT JOIN p.bundles b LEFT JOIN p.repositories r WHERE p.processed = :processed and p.created_at > :date ORDER BY p.created_at DESC' )
                ->setParameter('processed', true)
                ->setParameter('date', new \DateTime('-1 day'))
                ->getResults();
    }
}
