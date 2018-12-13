<?php
/**
 * Created by PhpStorm.
 * User: ds
 * Date: 2018-12-12
 * Time: 23:30
 */

use Sami\Sami;
use Symfony\Component\Finder\Finder;
use Sami\RemoteRepository\GitHubRemoteRepository;

$dir = '/Volumes/work/php/packages/netease-im/src';

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->in('/Volumes/work/php/packages/netease-im/src')
;

return new Sami($iterator, [
    'title'                => '网易云信Laravel API',
    'build_dir'            => __DIR__ . '/docs',
    'remote_repository'    => new GitHubRemoteRepository('shankesgk2/netease-im', dirname($dir))
]);