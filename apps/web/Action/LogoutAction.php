<?php
/**
 *
 *
 * PHP version 5
 *
 * @package
 * @author  Andrey Filippov <afi@i-loto.ru>
 */

namespace Web\Action;

use Dizel\Context;
use Slim\Http\Request;
use Slim\Http\Response;

class LogoutAction extends PrivateAction
{

	/**
	 * @param Request $request
	 * @param Response $response
	 * @param array $args
	 *
	 * @return Response
	 */
	public function execute(Request $request, Response $response, array $args)
	{
		Context::setActor(null);
		return $this->redirect("/");
	}
}

