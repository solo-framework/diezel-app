<?php
/**
 *
 *
 * PHP version 5
 *
 * @package
 * @author  Andrey Filippov <afi@i-loto.ru>
 */

namespace Web\Traits;

use Psr\Container\ContainerInterface;
use Slim\Http\Response;

/**
 * Ajax helpers. You may override these methods
 *
 * @property ContainerInterface container
 */
trait AjaxHelper
{
	/**
	 * @param $data
	 * @param int $httpCode
	 *
	 * @return Response
	 */
	public function sendSuccessJSON($data, $httpCode = 200)
	{
		/** @var $response Response */
		$response = $this->container["response"];

		$res["error"] = false;
		$res["data"] = $data;
		return $response->withJson($res)->withStatus($httpCode);
	}

	/**
	 * @param $data
	 * @param int $httpCode
	 *
	 * @return Response
	 */
	public function sendErrorJSON($data, $httpCode = 500)
	{
		/** @var $response Response */
		$response = $this->container["response"];

		$res["error"] = true;
		$res["data"] = $data;
		return $response->withJson($res)->withStatus($httpCode);
	}
}

