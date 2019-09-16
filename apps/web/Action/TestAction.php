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

use Dizel\Action;
use Dizel\Context;
use Slim\Http\Request;
use Slim\Http\Response;

class TestAction extends Action
{

	/**
	 * @param Request $request
	 * @param Response $response
	 * @param array $args
	 *
	 * @return void
	 */
	public function preExecute(Request $request, Response $response, array $args)
	{
		// TODO: Implement preExecute() method.
	}

	/**
	 * @param Request $request
	 * @param Response $response
	 * @param array $args
	 *
	 * @return Response
	 */
	public function execute(Request $request, Response $response, array $args)
	{
		$this->logger->error("ajax", [$request->isXhr()]);

		$myValue = $request->getParam("myvalue");
//		$this->logger->error($myValue);
		Context::set("my_value", $myValue);

		// do some work
		return $response->withRedirect("/index");

		// or return some data
//		return $response->withJson($request->getParams());

		// you may use trait AJAXResponse for return JSON as well
	}
}

