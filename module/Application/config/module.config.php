<?php

namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\ORM\EntityManager;

return [
    'doctrine' => [
        'driver' => [
           'my_annotation_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    __DIR__ .  '/../src/Entity'
                ],
            ],
            'orm_default' => [
                'drivers' => [
                     __NAMESPACE__ . '\Entity' => 'my_annotation_driver'
                ],
            ],
        ],
    ],
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\UrlController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'application' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],

            'url' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/url[/:action]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                    'defaults' => [
                        'controller' => Controller\UrlController::class,
                        'action'        => 'index',
                    ],
                ],
            ],

            'code' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '[/:code]',
                    'constraints' => [
                        'code'     => '[|^[0-9a-zA-Z]{6,6}$|]',
                    ],
                    'defaults' => [
                        'controller' => Controller\UrlController::class,
                        'action'        => 'forward',
                    ],
                ],
            ],

            'detail' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/detail[/:code]',
                    'constraints' => [
                        'code'     => '[|^[0-9a-zA-Z]{6,6}$|]',
                    ],
                    'defaults' => [
                        'controller' => Controller\DetailController::class,
                        'action'        => 'index',
                    ],
                ],
            ],

            'album' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/album[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\AlbumController::class,
                        'action'     => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'default' => [
                        'type'    => Segment::class,
                        'options' => [
                            'route'    => '/[/:controller][/:action]',
                            'constraints' => [
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ],
                            'defaults' => [
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\AlbumController::class => Factory\AlbumControllerFactory::class,
            Controller\UrlController::class => Factory\UrlControllerFactory::class,
            Controller\DetailController::class => Factory\DetailControllerFactory::class,
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
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
