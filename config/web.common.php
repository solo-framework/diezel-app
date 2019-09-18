<?php
/**
 *
 *
 * PHP version 5
 *
 * @package
 * @author  Andrey Filippov <afi@i-loto.ru>
 */

return [
	"@extends" => BASE_DIRECTORY . "/config/common.php",



	"logger" => [

		"version" => 1,
		"loggers" => [
			"default" => [
				"handlers" => ["stdout", "file"]
			]
		],
		"handlers" => [
//			"stdout" => [
//				"class" => "Monolog\Handler\StreamHandler",
//				"level" => "DEBUG",
//				"stream" => "php://stdout"
//			],
			"file" => [
				"class" => "Monolog\Handler\StreamHandler",
				"level" => "ERROR",
				"stream" => BASE_DIRECTORY . "/var/log/web.log",
				"processors" => ["web"]
			]
		],
		"processors" => [
			"web" => ["class" => \Monolog\Processor\WebProcessor::class]
		]
	],

	"app" => [
//		"debug"   => false,
		"routing" => BASE_DIRECTORY . "/config/web.routing.php",
	],

	"handlers" => [
		"phpErrorHandler" => \Web\Handler\Error::class,
		"errorHandler" =>  \Web\Handler\Error::class,
		"notFoundHandler" => \Web\Handler\NotFound::class,
		"notAllowedHandler" => \Web\Handler\NotAllowed::class,
	],

	"components" => [

//		"notFoundHandler" => [
//			"@class"  => \Slim\Handlers\NotFound::class,
//			"options" => null
//		],

		"view" => [
			"@class"  => \Dizel\Components\Twig::class,

			// Twig_Environment options
			"options" => [
				"path"       => BASE_DIRECTORY . "/apps/web/templates",
				"debug"      => true,
				"cache"      => BASE_DIRECTORY . "/var/cache",
				"extensions" => [
					\Twig\Extension\DebugExtension::class
				],
				"filters"    => [],
				"functions"  => [],
				"tags"       => [],

				"tests" => [],
			]

		]
	],

	"middlewares" => [

		Dizel\Middleware\Session::class => [

			"providerClass" => \Dizel\Session\File::class,
			"sessionName" => "test",
			"options"     => [
				'sessionOptions' => [
					'save_path' => BASE_DIRECTORY . '/var/sessions/',
					'cookie_domain'   => 'local-dizel-app.ru',//'localhost',
					"cache_expire"    => 180,
					"cache_limiter"   => 'nocache',
					"gc_maxlifetime"  => 60 * 30,
					"gc_probability"  => 10,
					"cookie_httponly" => true,
					"use_strict_mode" => true,
					"cookie_secure"   => false //- TRUE только при https
				]
			]
		],

		Dizel\Middleware\Test::class => [
			"p1" => "param1",
			"p2" => "param2",
		],
	],

];