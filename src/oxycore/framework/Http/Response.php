<?php
namespace Oxycore\Framework\Http;
use Twig\Loader\FilesystemLoader as twigLoader;
use Twig\Environment as twigEnvi;
use function Oxycore\Framework\prt;

class Response
{
    private $context;
    private $t_loader;
    private $env_view;
    public $view_file;
    public array $view_data;

    public function r__construct()
    {
        $this->t_loader = new twigLoader(APP_PATH.'/Resources/view/');
        $this->env_view = new twigEnvi($this->t_loader, ['debug' => false]);
        $this->t_loader->addPath(SRC_PATH.DS."WebSite".DS."Resources".DS."view".DS, "website");

        $this->view_file = 'base.html.twig';
        $this->view_data = ['title' => "base response", 'php_msg' => __CLASS__];
    }

    public function send()
    {
        ob_start();
        //print_r($this->context);
        //$this->base_view->display($this->context);
        $this->env_view->display("@website/".$this->view_file, $this->view_data);
        ob_end_flush();
    }
}