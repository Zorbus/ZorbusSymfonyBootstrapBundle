<?php

namespace Zorbus\SymfonyBootstrapBundle\Configuration\Bootstrap\Bundle;

use Zorbus\SymfonyBootstrapBundle\Configuration\Bootstrap\Bundle;

class DoctrineFixturesBundle extends Bundle {
    public function configure(){
        $requirement = array("doctrine/doctrine-fixtures-bundle" => "dev-master");

        $this->addRequirement($requirement);
        $this->getComposer()->update();
    }
}
