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

use Dizel\Context;
use Slim\Http\Request;
use Slim\Http\Response;

class LoginAction extends PublicAction
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
		try
		{
			$secret = $request->getParam("secret");

			if ($secret !== "secret")
			{
				Context::setFlashMessage("Wrong password", "error");
				return $this->redirectBack();
			}
			else
			{
				Context::setActor(["user_name" => $request->getParam("name")]);
			}
		}
		catch (\Exception $e)
		{
			// catch error and log
			$this->logger->error("Error!", ["post" => $request->getParams()]);
		}

		return $this->redirect("/home");
	}
}

