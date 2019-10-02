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

use Slim\Http\Request;
use Slim\Http\Response;

class AjaxView extends PublicView
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
		return $this->display($response);
	}
}

