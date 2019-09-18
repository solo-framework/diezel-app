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

use Dizel\Application;
use Dizel\Context;
use Dizel\View;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Router;
use Web\Helper\InternalErrorHandler;

class IndexView extends View
{

	public $title = "title value";

	public $myValue = null;

	/**
	 * @param Request $request
	 * @param Response $response
	 * @param array $args
	 *
	 * @return Response|void
	 */
	public function preExecute(Request $request, Response $response, array $args)
	{
	//	if (!$actor)
	//		return $response->withRedirect("/index");
	}

	/**
	 * @param Request $request
	 * @param Response $response
	 * @param array $args
	 *
	 * @return ResponseInterface
	 */
	public function execute(Request $request, Response $response, array $args)
	{
//		print_r(Application::getInstance()->getComponent("router")->pathFor("action.test"));


//		$i = new InternalErrorHandler(Application::getInstance()->app->getContainer(), true);
//		$i->
//		throw new \Error("rrrrrrr");
//		throw new \RuntimeException("runt");
//		echo $s;
		$this->logger->debug("page", ["index"]);

		$this->title = $request->getParam("title", $this->title);
		$this->myValue = Context::delete("my_value");

		return $this->display($response);
	}
}

