<?php
namespace Oxycore\Framework\Http;

class Response
{
    public function __construct($content)
    {
        ob_start();
        ob_flush();
        print_r($content);
        ob_end_flush();
    }
}