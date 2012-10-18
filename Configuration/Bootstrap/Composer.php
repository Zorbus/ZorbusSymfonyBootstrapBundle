<?php

namespace Zorbus\SymfonyBootstrapBundle\Configuration\Bootstrap;

use Symfony\Component\Process\Process;

class Composer
{

    protected $path;
    protected $contents;

    public function __construct($path)
    {
        $this->path = realpath($path . '/composer.json');

        if (!$this->path || !file_exists($this->path) || !is_writable($this->path))
        {
            throw new \Exception(sprintf('Composer config file "%s" does not exist or is unwritable.', $this->path));
        }

        $this->contents = json_decode(file_get_contents($this->path), true);
    }

    public function add($name, array $config)
    {
        $values = $this->get($name);
        $values[] = $config;

        $this->contents[$name] = $values;

        $this->save();
    }
    public function replace($name, array $value)
    {
        $this->contents[$name] = $value;
        $this->save();
    }

    public function addRepository(array $repository)
    {
        $this->add('repositories', $repository);
    }

    public function addRequirement(array $requirement)
    {
        $requirements = $this->get('require');
        $this->replace('require', array_merge($requirements, $requirement));
    }

    public function get($name)
    {
        return array_key_exists($name, $this->contents) ? $this->contents[$name] : array();
    }

    public function update()
    {
        chdir(dirname($this->path));
        $process = new Process('composer.phar update');
        $process->run();
    }
    public function save()
    {
        file_put_contents($this->path, json_encode($this->contents, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }
}