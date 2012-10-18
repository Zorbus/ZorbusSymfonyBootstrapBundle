Zorbus Symfony Bootstrap
========================

This bundles has the goal to fasten the creation and configuration of a Symfony2 project.
You pick the bundles and repositories you need in your brand new project and it uses composer to download the packages.

When processed you get an e-mail with instructions to download the packages.

Bundles
-------

For a bundle to be dynamically configured, it must has a class that extends the Zorbus\SymfonyBootstrapBundle\Configuration\Bootstrap\Bundle.
All the configuration actions must take place in the configure method.

Check the examples available in Zorbus/SymfonyBootstrapBundle/Configuration/Bootstrap/Bundle/Bundle.

Repositories
------------

For a repository to be dynamically configured, it must has a class that extends the Zorbus\SymfonyBootstrapBundle\Configuration\Bootstrap\Repository.
All the configuration actions must take place in the configure method.

Check the examples available in Zorbus/SymfonyBootstrapBundle/Configuration/Bootstrap/Repository/Repository.

Composer
--------

Composer is responsible for the creation of the Symfony2 project and download all the bundles needed.

There is a class in Zorbus/SymfonyBootstrapBundle/Configuration/Bootstrap/Composer that eases the manipulation of the composer.json file.

Command
-------

When the form is submit, it saves the project details in a database. There are two commands available, one to process the requests and another to purge the temporary files generated.

* php app/console bootstrap:process
* php app/console bootstrap:purge

In a live and operational service, the bootstrap:process should run in a cron.

Optimization
------------

At the moment, every request that is processed downloads the bundles, what increases the bandwith used by the server.
A more efficient way would to be have a local sample of the files by version and copy them when needed. It would be faster to process and less resource consuming.

Demo
----

Check a live demo at http://symfonybootstrap.titomiguelcosta.com/
