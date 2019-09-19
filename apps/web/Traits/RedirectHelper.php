<?php
/**
 *
 *
 * PHP version 5
 *
 * @package
 * @author  Andrey Filippov <afi@i-loto.ru>
 */

namespace Web\Traits;

use Dizel\Application;
use Psr\Http\Message\UriInterface;
use Slim\Http\Request;
use Slim\Http\Response;

trait RedirectHelper
{
	/**
	 * @param null $status
	 *
	 * @return Response
	 */
	public function redirectBack($status = null)
	{
		/** @var $request Request */
		$request = Application::getInstance()->getComponent('request');
		$header = $request->getHeader("HTTP_REFERER");
		$referer = array_shift($header);
		if (!$referer)
			$referer = "/";

		/** @var $response Response*/
		$response = Application::getInstance()->getComponent('response');
		return $response->withRedirect($referer, $status);
	}

	/**
	 * Redirect to URL
	 *
	 * @param string|UriInterface $url    The redirect destination.
	 * @param int $status
	 *
	 * @return Response
	 */
	public function redirect($url, int $status = 302)
	{
		/** @var $response Response*/
		$response = Application::getInstance()->getComponent('response');
		return $response->withRedirect($url, $status);
	}
}

