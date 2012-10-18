<?php

namespace Zorbus\SymfonyBootstrapBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\RuntimeException;

class BootstrapCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
                ->setName('bootstrap:process')
                ->setDescription('Bootstrap a Symfony2 project')
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

        $project = $em
                ->getRepository('ZorbusSymfonyBootstrapBundle:Project')
                ->getNextToProcess();

        if ($project)
        {
            chdir($path);

            $dir = $project->getName();
            if ($dir)
            {
                $filesystem->remove($dir);
            }
            $output->writeln('Creating symfony project ' . $project . '...');

            $process = new Process(sprintf('composer.phar create-project symfony/framework-standard-edition %s %s', $dir, $project->getSymfony()));
            $process->run();

            if ($process->isSuccessful())
            {
                //if(true){
                /**
                 * Repositories
                 */
                $repositoryFactory = $this->getContainer()->get('bootstrap.repository.factory');
                foreach ($project->getRepositories() as $repository)
                {
                    $output->writeln('Configuring ' . $repository . '...');
                    $object = $repositoryFactory->load($repository->getClass(), $path . '/' . $dir . '/app');
                    $object->configure();
                }

                /**
                 * Bundles
                 */
                $bundleFactory = $this->getContainer()->get('bootstrap.bundle.factory');
                foreach ($project->getBundles() as $bundle)
                {
                    $output->writeln('Configuring ' . $bundle . '...');
                    $object = $bundleFactory->load($bundle->getClass(), $path . '/' . $dir . '/app');
                    $object->configure();
                }

                $project->setProcessed(true);
                $em->flush();

                /* create tgz file */
                $output->writeln('Creating tgz file...');
                $command = sprintf('cd %s && tar cfz %s.tgz %s', realpath($path), $project->getName(), $project->getName());
                $tgz_process = new Process($command);
                $tgz_process->run();

                if ($tgz_process->isSuccessful())
                {
                    $command = sprintf('cd %s && mv %s %s', realpath($path.'/../web/bootstrap'), realpath($path.'/'.$project->getName().'.tgz'), $project->getName().'.tgz');
                    $tgz_process = new Process($command);
                    $tgz_process->run();

                    $filesystem->remove($path . '/' . $project->getName() . '.tgz');
                    $filesystem->remove($path . '/' . $project->getName());

                    $body = <<<BODY
                        <h1>Symfony Bootstrap</h1>
                        <p>Hi %s, you can download your Symfony2 Bootstrap <a href="%s">here</a>.</p>
                        <p>It will be available for one day.</p>
                        <p>Enjoy Symfony2.</p>
BODY;

                    $message = \Swift_Message::newInstance()
                            ->setSubject('Symfony Bootstrap')
                            ->setFrom('zorbus@titomiguelcosta.com')
                            ->setTo($project->getEmail())
                            ->setBody(sprintf($body, $project->getAuthor(), 'http://symfonybootstrap.titomiguelcosta.com/download/' . $project->getToken()));

                    $this->getContainer()->get('mailer')->send($message);
                }
                else
                {
                    $output->writeln('<error>There was an error creating the tgz file.</error>');
                }
                $output->write('Symfony bootstrap completed.');
            }
            else
            {
                throw new RuntimeException($process->getErrorOutput());
            }
        }
        else
        {
            $output->writeln('No projects to process.');
        }
    }

}