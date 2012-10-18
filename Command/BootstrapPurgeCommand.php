<?php

namespace Zorbus\SymfonyBootstrapBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class BootstrapPurgeCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
                ->setName('bootstrap:purge')
                ->setDescription('Purges processed bootstrap Symfony2 projects')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /* @var $filesystem \Symfony\Component\Filesystem\Filesystem */
        $filesystem = $this->getContainer()->get('filesystem');
        $path = $this->getContainer()->get('kernel')->getRootDir() . '/../bootstrap';

        $em = $this
                ->getContainer()
                ->get('doctrine.orm.entity_manager');

        $projects = $em
                ->getRepository('ZorbusSymfonyBootstrapBundle:Project')
                ->getProcessed();

        foreach($projects as $project)
        {
            $dir = $path.'/'.$project->getName();
            if ($dir)
            {
                $filesystem->remove($dir);
            }
            $em->remove($project);
        }
        $em->flush();
    }

}