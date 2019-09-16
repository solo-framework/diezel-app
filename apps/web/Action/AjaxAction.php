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
use Dizel\Traits\AJAXResponse;
use Slim\Http\Request;
use Slim\Http\Response;

class AjaxAction extends Action
{

	use AJAXResponse;

	/**
	 * @param Request $request
	 * @param Response $response
	 * @param array $args
	 *
	 * @return Response|void
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
		return $this->sendSuccessJSON($request->getParams());
	}
}

