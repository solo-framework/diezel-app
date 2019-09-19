<?php
/**
 *
 *
 * PHP version 5
 *
 * @package
 * @author  Andrey Filippov <afi@i-loto.ru>
 */

namespace Web\View;

use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class HomeView extends PrivateView
{

	/**
	 * @param Request $request
	 * @param Response $response
	 * @param array $args
	 *
	 * @return ResponseInterface
	 */
	public function execute(Request $request, Response $response, array $args)
	{
		return $this->display($response);
	}
}

