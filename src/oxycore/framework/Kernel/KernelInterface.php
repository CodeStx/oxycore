<?php
namespace Oxycore\Framework\Kernel;

interface KernelInterface
{
    public function terminate($request, $response);
    public function handle($router);
}