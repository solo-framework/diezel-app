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

use Dizel\Context;
use Slim\Http\Request;
use Slim\Http\Response;
use Web\Traits\AjaxHelper;

abstract class PrivateView extends BaseView
{
	use AjaxHelper;

	/**
	 * @param Request $request
	 * @param Response $response
	 * @param array $args
	 *
	 * @return Response
	 */
	public function preExecute(Request $request, Response $response, array $args)
	{
		parent::preExecute($request, $response, $args);

		if (!$this->actor)
		{
			if ($request->isXhr())
			{
				return $this->sendErrorJSON("Permission denied", 401);
			}
			else
			{
				Context::setFlashMessage("Permission denied", "error"); // is it really need here?
				return $this->redirect("/");
			}
		}

		return null;
	}
}

