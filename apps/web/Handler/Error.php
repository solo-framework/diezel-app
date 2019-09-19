<?php
/**
 *
 *
 * PHP version 5
 *
 * @package
 * @author  Andrey Filippov <afi.work@gmail.com>
 */

namespace Web\Handler;

use Dizel\Traits\BaseHandler;
use Slim\Handlers\PhpError;
use Throwable;

class Error extends PhpError
{

	use BaseHandler;


	/**
	 * Render HTML error page
	 *
	 * @param Throwable $error
	 *
	 * @return string
	 * @throws \Twig\Error\LoaderError
	 */
	protected function renderHtmlErrorMessage(Throwable $error)
	{
		/** @var $view \Slim\Views\Twig*/
		$view = $this->container->get("view");

		$type = get_class($error);
		return $view->fetch("handlers/error.twig", ["error" => $error, "debug" => $this->displayErrorDetails, "type" => $type]);
	}
}

