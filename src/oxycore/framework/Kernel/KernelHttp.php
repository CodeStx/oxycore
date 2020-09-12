<?php
namespace Oxycore\Framework\Kernel;

use Oxycore\Framework\Http\Request;
use Oxycore\Framework\Http\Response;
use Oxycore\Framework\Routing\Router;
use Twig\Template;

abstract class KernelHttp implements KernelInterface
{
    protected bool $boot = false;

    protected array $container;

    protected string $envirnoment;
    protected bool $debug;


    abstract public function handle(Request $request);
}