<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Album;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
	        'home-album' => [
		        'type'    => Literal::class,
		        'options' => [
			        'route'    => '/album',
			        'defaults' => [
				        'controller' => Controller\IndexController::class,
				        'action'     => 'index',
			        ],
		        ],
	        ],
	        'home-album-add' => [
		        'type'    => Literal::class,
		        'options' => [
			        'route'    => '/album/add',
			        'defaults' => [
				        'controller' => Controller\IndexController::class,
				        'action'     => 'add',
			        ],
		        ],
	        ],
	        'home-album-edit' => [
		        'type'    => Literal::class,
		        'options' => [
			        'route'    => '/album/edit',
			        'constraints' => [
			        	   'id' => '[0-9]+'
			        ],
			        'defaults' => [
				        'controller' => Controller\IndexController::class,
				        'action'     => 'edit',
			        ],
		        ],
	        ],
	        'home-album-delete' => [
		        'type'    => Literal::class,
		        'options' => [
			        'route'    => '/album/delete[/:id]',
			        'constraints' => [
				        'id' => '[0-9]+'
			        ],
			        'defaults' => [
				        'controller' => Controller\IndexController::class,
				        'action'     => 'delete',
			        ],
		        ],
	        ],
           /* 'album' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/album[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],*/
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'album/index/index' => __DIR__ . '/../view/album/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
