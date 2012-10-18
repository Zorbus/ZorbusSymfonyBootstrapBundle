<?php

namespace Zorbus\SymfonyBootstrapBundle\Configuration\Bootstrap\Repository;

use Zorbus\SymfonyBootstrapBundle\Configuration\Bootstrap\Repository;

class TwitterBootstrapRepository extends Repository
{

    public function configure()
    {
        $repository = array(
            "type" => "package",
            "package" => array(
                "version" => "master",
                "name" => "twitter/bootstrap",
                "source" => array(
                    "url" => "https://github.com/twitter/bootstrap.git",
                    "type" => "git",
                    "reference" => "master"
                ),
                "dist" => array(
                    "url" => "https://github.com/twitter/bootstrap/zipball/master",
                    "type" => "zip"
                )
            )
        );
        $this->add($repository);
    }

}