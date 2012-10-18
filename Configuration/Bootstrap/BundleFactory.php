<?php

namespace Zorbus\SymfonyBootstrapBundle\Configuration\Bootstrap;

use Symfony\Component\HttpKernel\Kernel;

class BundleFactory
{

    public $container;

    public function __construct(Kernel $kernel)
    {
        $this->container = $kernel->getContainer();
    }

    public function load($bundleClassName, $rootDir)
    {
        if (!class_exists($bundleClassName))
        {
            throw new \InvalidArgumentException(sprintf('class %s does not exist', $bundleClassName));
        }

        $object = new $bundleClassName($this->container, $rootDir);

        if (!$object instanceof Bundle)
        {
            throw new \InvalidArgumentException(sprintf('class %s must be instance of %s', $bundleClassName, 'Bundle'));
        }

        return $object;
    }

}