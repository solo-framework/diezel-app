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
use Dizel\View;
use Slim\Http\Request;
use Slim\Http\Response;
use Web\Traits\RedirectHelper;

abstract class BaseView extends View
{
	use RedirectHelper;


	/**
	 * Current actor
	 *
	 * @var null
	 */
	public $actor = null;

	public $flashMessage = null;

	/**
	 * @param Request $request
	 * @param Response $response
	 * @param array $args
	 *
	 * @return Response|void
	 */
	public function preExecute(Request $request, Response $response, array $args)
	{
		$this->actor = Context::getActor();
		$this->flashMessage = Context::getFlashMessage();
	}
}

