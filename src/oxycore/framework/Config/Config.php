<?php
namespace Oxycore\Framework\Config;

use function Oxycore\Framework\Boost\includeIfExist;

class Config
{
    private array $_config;

    public function __construct()
    {
        $this->_config = include APP_PATH . "/config/configs.php";
    }

    public function __get($key)
    {
        return $this->_config[$key];
    }

    public function getAll(): array
    {
        return $this->_config;
    }
}