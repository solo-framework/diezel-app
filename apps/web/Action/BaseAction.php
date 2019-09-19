<?php
/**
 *
 *
 * PHP version 5
 *
 * @package
 * @author  Andrey Filippov <afi.work@gmail.com>
 */

namespace Web\Action;

use Dizel\Action;
use Dizel\Context;
use Slim\Http\Request;
use Slim\Http\Response;
use Web\Traits\AjaxHelper;
use Web\Traits\RedirectHelper;

abstract class BaseAction extends Action
{
	use RedirectHelper;
	use AjaxHelper;

	/**
	 * Current actor
	 *
	 * @var null
	 */
	public $actor = null;

	public function preExecute(Request $request, Response $response, array $args)
	{
		$this->actor = Context::getActor();
	}
}

