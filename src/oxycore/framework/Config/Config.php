<?php
namespace Oxycore\Framework\Config;

use function Oxycore\Framework\includeIfExist;

class Config
{
    private static ?Config $instance;
    private array $_config;

    public function __construct()
    {
        if (self::$instance===null)
        $this->_config = includeIfExists(APP_PATH . "/config/configs.php");
    }

    public function __get($key)
    {
        return $this->_config[$key];
    }

    public function __clone()
    {
        throw new \Exception('Config is singleton - it cannot be cloned');
    }

    public function __wakeup()
    {
        throw new \Exception('Config is singleton - it cannot be unserialized');
    }

    public function __unserialize(array $data)
    {
        throw new \Exception('Config is singleton - it cannot be unserialized');
    }

    public static function instance(): Config
    {
        if (self::$instance===null) {
            self::$instance = new Config();
        }

        return self::$instance;
    }

    public function getAll(): array
    {
        return $this->_config;
    }
}