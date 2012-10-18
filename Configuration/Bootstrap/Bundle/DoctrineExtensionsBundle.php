<?php

namespace Zorbus\SymfonyBootstrapBundle\Configuration\Bootstrap\Bundle;

use Zorbus\SymfonyBootstrapBundle\Configuration\Bootstrap\Bundle;

class DoctrineExtensionsBundle extends Bundle {
    public function configure(){
        $requirement = array("stof/doctrine-extensions-bundle" => "dev-master");

        $this->addRequirement($requirement);
        $this->getComposer()->update();
    }
}
