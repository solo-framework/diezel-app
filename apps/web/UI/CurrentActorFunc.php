<?php
/**
 *
 *
 * PHP version 5
 *
 * @package
 * @author  Andrey Filippov <afi@i-loto.ru>
 */

namespace Web\UI;

use Twig\Environment;

class CurrentActorFunc
{
	public function __invoke(Environment $env, $ctx)
	{
		$actor = @$ctx["actor"];
		if ($actor)
			return $actor["user_name"];
		else
			return "ANON";
	}
}

