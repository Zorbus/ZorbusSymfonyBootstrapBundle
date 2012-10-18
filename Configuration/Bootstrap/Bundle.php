<?php

namespace Zorbus\SymfonyBootstrapBundle\Configuration\Bootstrap;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\DependencyInjection\Container;

abstract class Bundle
{
    protected $filesystem;
    protected $container;
    protected $composer;

    public function __construct(Container $container, $rootDir)
    {
        $this->container = $container;
        $this->filesystem = new Filesystem();

        $this->composer = new Composer(realpath($rootDir . '/..'));
    }

    public function getComposer()
    {
        return $this->composer;
    }

    public function addRequirement(array $requirement)
    {
        $this->getComposer()->addRequirement($requirement);
    }
}