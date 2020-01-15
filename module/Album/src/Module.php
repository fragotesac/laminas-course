<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Album;

use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;

class Module
{
    public function getConfig() : array
    {
        return include __DIR__ . '/../config/module.config.php';
    }

	public function getServiceConfig()
	{
		return [
			'factories' => [
				Model\AlbumTable::class => function($container) {
					$tableGateway = $container->get(Model\AlbumTableGateway::class);
					return new Model\AlbumTable($tableGateway);
				},
				Model\AlbumTableGateway::class => function ($container) {
					$dbAdapter = $container->get(AdapterInterface::class);
					$resultSetPrototype = new ResultSet();
					$resultSetPrototype->setArrayObjectPrototype(new Model\Album());
					return new TableGateway('album', $dbAdapter, null, $resultSetPrototype);
				},
			],
		];
	}

	public function getControllerConfig()
	{
		return [
			'factories' => [
				Controller\IndexController::class => function($container) {
					return new Controller\IndexController(
						$container->get(Model\AlbumTable::class)
					);
				},
			],
		];
	}
}
