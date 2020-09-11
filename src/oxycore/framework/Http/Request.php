<?php
namespace Oxycore\Framework\Http;

class Request
{
    public function __construct()
    {
        $this->parse_url();
    }

    static public function createFromGlobals()
    {
        return new Request();
    }

    private function parse_url()
    {
        $url_path = $_SERVER['PATH_INFO'];
    }
}