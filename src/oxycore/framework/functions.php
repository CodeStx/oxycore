<?php
namespace Oxycore\Framework;

if (!function_exists('includeIfExist')) {
    function includeIfExist(string $filePath) : bool
    {
        return file_exists($filePath) && include $filePath;
    }
}

if (!function_exists("load_basic_bootstrap")){
    function load_basic_bootstrap(): void
    {
        @define('BOOT_INIT', microtime(true));
        @define('ENVIRNOMENT', strtolower(substr(getenv('ENVIRNOMENT'), 0, 4)));
        @define('DS', DIRECTORY_SEPARATOR);
        @define('PS', PATH_SEPARATOR);

        @define('ROOTLINK', dirname(getcwd()));
        @define('ROOT_PATH', dirname(getcwd()));
        @define('APP_PATH', ROOTLINK.DS."app");
        @define('BOOST_PATH', ROOTLINK . DS . "bootstrap");
        @define('OXYCORE_PATH', ROOTLINK . DS . "src/oxycore/");
        @define('PUBLIC_PATH', ROOTLINK . DS . "public");
        @define('SRC_PATH', ROOTLINK . DS . "src");
        @define('VENDOR_PATH', ROOTLINK . DS . "vendor");
    }
}

if (!function_exists("prt")) {
    function prt($array)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
}

if (!function_exists("backtrace")) {
    function backtrace()
    {
        echo "<pre>";
        debug_print_backtrace();
        echo "</pre>";
    }
}

if (!function_exists("basePath")) {
    function basePath(): string
    {
        return getcwd();
    }
}