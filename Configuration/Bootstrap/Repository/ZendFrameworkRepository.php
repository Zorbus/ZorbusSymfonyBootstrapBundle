<?php

namespace Zorbus\SymfonyBootstrapBundle\Configuration\Bootstrap\Repository;

use Zorbus\SymfonyBootstrapBundle\Configuration\Bootstrap\Repository;

class ZendFrameworkRepository extends Repository {
    public function configure(){
        $repository = array(
            "type" => "composer",
            "url" => "http://packages.zendframework.com/"
        );

        $this->add($repository);
    }
}