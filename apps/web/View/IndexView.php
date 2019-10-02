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

use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class IndexView extends PublicView
{
	public $title = "title value";


	/**
	 * @param Request $request
	 * @param Response $response
	 * @param array $args
	 *
	 * @return ResponseInterface
	 */
	public function execute(Request $request, Response $response, array $args)
	{
		$this->logger->debug("Requested page", ["index"]);
		$this->title = $request->getParam("title", $this->title);

		return $this->display($response);
	}
}

