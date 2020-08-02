<?php


namespace Upstain\AmadeusApiClient;

use Plumbok\Autoload;
use Plumbok\Cache\FileCache;

Autoload::register('Upstain\\AmadeusApiClient', new FileCache(__DIR__ . '/../cache'));

trait PlumbokTrait
{
}
