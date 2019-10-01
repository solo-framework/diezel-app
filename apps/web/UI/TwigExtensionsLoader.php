<?php
/**
 *
 *
 * PHP version 5
 *
 * @package
 * @author  Andrey Filippov <afi@i-loto.ru>
 */

namespace Web\UI;

use Psr\Container\ContainerInterface;
use Slim\Views\Twig;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class TwigExtensionsLoader
{
	/**
	 * @var null|ContainerInterface
	 */
	protected $container = null;

	/**
	 * @var bool
	 */
	protected $debug;
	/**
	 * @var Twig
	 */
	protected $service;

	/**
	 * @var mixed
	 */
	protected $options;

	/**
	 * TwigSettingsLoader constructor.
	 *
	 * @param Twig $service
	 * @param ContainerInterface $container
	 * @param $options
	 * @param $debug
	 */
	public function __construct(Twig $service, ContainerInterface $container, $options, $debug)
	{
		$this->container = $container;
		$this->debug = $debug;
		$this->service = $service;

		$this->load();
		$this->options = $options;
	}

	public function load()
	{
		if ($this->debug)
		{
			$this->service->getEnvironment()->addExtension(new DebugExtension());
		}

		// For built-in functions (filters, etc.) see class CoreExtension

		//
		// FUNCTIONS
		//


		# Function examples

//		$testFunc = new TwigFunction("test_func2",
//			function (Environment $env, $ctx, $arg1, $arg2){
//				return 'THIS IS RESULT OF test_func2 WITH ARGS ' . $arg1 . ' and ' . $arg2;
//			}
//		);
//		$this->service->getEnvironment()->addFunction($testFunc);

		$currentActorFunc = new TwigFunction(
			"current_actor",
			new CurrentActorFunc(),
			['needs_environment' => true, "needs_context" => true, "deprecated" => true]
		);

		$this->service->getEnvironment()->addFunction($currentActorFunc);

		//
		// FILTERS
		//

		$rot13filter = new TwigFilter('rot13',
			function ($string) {
				return  str_rot13($string);
			}
		);

		$this->service->getEnvironment()->addFilter($rot13filter);

	}
}

