<?php
namespace Oxycore\Framework\Core;

abstract class BootstrapAbstract
{
    protected array $_services;
    protected $_container;

    public function __construct($container=null)
    {
        $this->_container = $container;
    }

    public function start()
    {
        foreach($this->_services as $service) {
            $method = '_'.$service;
            $this->$method($this->_container);
        }
    }
}