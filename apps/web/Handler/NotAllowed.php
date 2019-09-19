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

class NotAllowed extends \Slim\Handlers\NotAllowed
{
	use BaseHandler;

	/**
	 * Render HTML not allowed message
	 *
	 * @param  string[] $methods
	 *
	 * @return string
	 * @throws \Twig\Error\LoaderError
	 */
	protected function renderHtmlNotAllowedMessage($methods)
	{
		$allow = implode(', ', $methods);

		/** @var $view \Slim\Views\Twig*/
		$view = $this->container->get("view");
		return $view->fetch("handlers/not_allowed.twig", ["allow" => $allow]);
	}
}

