<?php
namespace Oxycore\Framework\Kernel;

use Oxycore\Framework\Http\Request;
use Oxycore\Framework\Http\Response;
use Oxycore\Framework\Routing\Router;

interface KernelInterface
{
    const ENABLE  = true;
    const DISABLE = false;

    const ENV_DEVELOPMENT = "Development";
    const ENV_PRODUCTION  = "Production";
    const ENV_RELEASE     = "Release";

    public function handle(Request $request);
}