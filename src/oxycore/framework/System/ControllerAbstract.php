<?php
namespace Oxycore\Framework\System;
use Oxycore\Framework\Http\Response;
use Oxycore\Framework\Routing\Router;
use Twig\Loader\FilesystemLoader;
use Twig\Environment as TwigView;

abstract class ControllerAbstract
{
    protected array $asset_data;
    protected TwigView $view;
    protected Response $response;
    protected $rendered_view;
    protected $view_buffer;
    protected $templateRender;

    protected $di;

    public function __construct($di = null)
    {
        if ($di!==null) {
            $this->di = $di;
        }

        $ltpl = new FilesystemLoader(ROOT_PATH.'/app/Resources/view/');
        $this->view = new TwigView($ltpl, ['debug'=>false]);
        $view_path = ROOT_PATH.'/src/WebSite/Resources/view/';
        $ltpl->addPath($view_path, "website");
        $view_file = $this->di->get_controller().'/'.$this->di->get_method().'.html.twig';
        $this->asset_data = ['title' => "tytul strony", 'php_msg' => "PHP7"];
        $this->view->render("@website/".$view_file, $this->asset_data);

    }

    public function end()
    {
        $this->response = new Response();
    }

    public function __destruct()
    {
        $this->end();
    }

    public function redirect($url)
    {
        header("location: " . $url);
    }

    public function generateUrl($name, $data = null)
    {
        $router = new Router('http://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
        $cluster = $router->getCluster();
        $route = $cluster->get($name);
        if (isset($route)) {
            return $route->geneRateUrl($data);
        }
        return false;
    }
}