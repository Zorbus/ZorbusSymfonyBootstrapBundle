<?php

namespace Zorbus\SymfonyBootstrapBundle\Configuration\Bootstrap;

use Symfony\Component\Filesystem\Filesystem;

abstract class Repository
{

    protected $filesystem;
    protected $kernel;
    protected $composer;

    public function __construct($rootDir)
    {
        $this->composer = new Composer(realpath($rootDir . '/..'));
    }

    public function getComposer()
    {
        return $this->composer;
    }

    public function add(array $repository)
    {
        $this->composer->addRepository($repository);
    }

}