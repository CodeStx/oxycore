<?php
namespace Oxycore\Framework\Routing;

use Oxycore\Framework\Http\Request;

class Router
{
    private array $_config;

    private $controller;
    private $method;

    private Request $request;
    private array $_request;
    private array $params;

    public function __construct(Request $request)
    {
        $this->_config = [
            'debug' => false
        ];

        $this->request = $request;
        $this->_request = $this->request->getParams();

        $this->controller = $this->_request[0];
        $this->method = $this->_request[1];

        for($i=2;$i<=count($this->_request)-1;$i++)
        {
            $this->params[$i-2] = $this->_request[$i];
            if($this->_config['debug']) {
                $id = $i-2;
                print "param id: {$id},  [{$this->params[$id]}]<br/>";
            }
        }
    }

    public function get_controller(): string
    {
        return $this->controller;
    }

    public function get_method(): string
    {
        return $this->method;
    }
}