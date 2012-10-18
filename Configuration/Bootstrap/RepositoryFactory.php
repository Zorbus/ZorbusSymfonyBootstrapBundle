<?php

namespace Zorbus\SymfonyBootstrapBundle\Configuration\Bootstrap;

use Symfony\Component\HttpKernel\Kernel;

class RepositoryFactory
{

    public $container;

    public function __construct(Kernel $kernel)
    {
        $this->container = $kernel->getContainer();
    }

    public function load($repositoryClassName, $rootDir)
    {
        if (!class_exists($repositoryClassName))
        {
            throw new \InvalidArgumentException(sprintf('class %s does not exist', $repositoryClassName));
        }

        $object = new $repositoryClassName($rootDir);

        if (!$object instanceof Repository)
        {
            throw new \InvalidArgumentException(sprintf('class %s must be instance of %s', $repositoryClassName, 'Repository'));
        }

        return $object;
    }

}