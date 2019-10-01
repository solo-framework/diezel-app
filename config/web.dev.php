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
	"@extends" => BASE_DIRECTORY ."/config/web.common.php",

	"framework" => [
		'settings' => [
//			"debug" => true,
			'displayErrorDetails' => true
		],
	],

	"app" => [
//		"debug" => true,
//		"routing" => "config/routing.php"
	],

	"logger" => [

//		"version" => 1,
//		"loggers" => [
//			"default" => [
//				"handlers" => ["stdout", "file"]
//			]
//		],
		"handlers" => [
//			"stdout" => [
//				"class" => "Monolog\Handler\StreamHandler",
//				"level" => "DEBUG",
//				"stream" => "php://stdout"
//			],
			"file" => [
//				"class" => "Monolog\Handler\StreamHandler",
				"level" => "DEBUG",
//				"stream" => BASE_DIRECTORY . "/var/log/web.log"
//				"formatter" => "file",
			]
		],

//		"formatters" => [
//			"file" => [
//				"class"  => "Monolog\Formatter\LineFormatter",
//				"format" => "[%datetime%] %channel%.%level_name%: %message% \nContext: %context% \nExtra: %extra%\n"
//			]
//		]
	],

	"components" => [

		"view" => [

			// Twig_Environment options
			"options" => [
				"debug" => true,
				"cache" => false
			]
		]
	],
];