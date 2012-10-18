<?php

namespace Zorbus\SymfonyBootstrapBundle\Configuration\Bootstrap\Bundle;

use Zorbus\SymfonyBootstrapBundle\Configuration\Bootstrap\Bundle;

class DoctrineMigrationsBundle extends Bundle {
    public function configure(){
        $requirement = array("doctrine/doctrine-migrations-bundle" => "dev-master");

        $this->addRequirement($requirement);
        $this->getComposer()->update();
    }
}
