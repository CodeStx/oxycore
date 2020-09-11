<?php
namespace Oxycore\Framework\Core;

abstract class ProviderAbstract
{
    private array $_config;

    public function __construct(array $configuration)
    {
        $this->_config = $configuration;
    }

    abstract public function provide();
}