<?php
namespace Oxycore\Framework\Boost;

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

        @define('ROOTLINK', dirname(dirname(__FILE__)));
        @define('ROOT_PATH', dirname(dirname(__FILE__)));
        @define('APP_PATH', ROOTLINK);
        @define('BOOST_PATH', ROOTLINK . DS . "bootstrap");
        @define('OXYCORE_PATH', ROOTLINK . DS . "phpnitrox");
        @define('PUBLIC_PATH', ROOTLINK . DS . "public");
        @define('SRC_PATH', ROOTLINK . DS . "src");
        @define('VENDOR_PATH', ROOTLINK . DS . "vendor");
    }
}