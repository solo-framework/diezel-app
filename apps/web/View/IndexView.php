<?php
/**
 *
 *
 * PHP version 5
 *
 * @package
 * @author  Andrey Filippov <afi.work@gmail.com>
 */

namespace Web\View;

use Dizel\Context;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use Web\Traits\AjaxHelper;

class IndexView extends PublicView
{
	public $title = "title value";

	public $myValue = null;



	/**
	 * @param Request $request
	 * @param Response $response
	 * @param array $args
	 *
	 * @return ResponseInterface
	 */
	public function execute(Request $request, Response $response, array $args)
	{
//		throw new \Error("rrrrrrr");
//		throw new \RuntimeException("runt");
//		echo $s;
		$this->logger->debug("Requested page", ["index"]);

		$this->title = $request->getParam("title", $this->title);
		$this->myValue = Context::delete("my_value");

		return $this->display($response);
	}

}

