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
use Psr\Http\Message\ServerRequestInterface;

class NotFound extends \Slim\Handlers\NotFound
{
	use BaseHandler;

	/**
	 * Return a response for text/html content not found
	 *
	 * @param  ServerRequestInterface $request The most recent Request object
	 *
	 * @return string
	 * @throws \Twig\Error\LoaderError
	 */
	protected function renderHtmlNotFoundOutput(ServerRequestInterface $request)
	{
		$homeUrl = (string)($request->getUri()->withPath('')->withQuery('')->withFragment(''));

		/** @var $view \Slim\Views\Twig*/
		$view = $this->container->get("view");
		return $view->fetch("handlers/not_found.twig", ["homeUrl" => $homeUrl]);
	}
}

