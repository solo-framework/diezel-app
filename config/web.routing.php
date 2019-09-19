<?php
/**
 *
 *
 * PHP version 5
 *
 * @package
 * @author  Andrey Filippov <afi@i-loto.ru>
 */

//use App\View\IndexView;
use Web\View\HomeView;
use Web\View\IndexView;

/** @var $router \Slim\App */
$router = \Dizel\Application::getInstance()->app;

$router->get("/", IndexView::class)->setName("view.index");
$router->get("/index", IndexView::class)->setName("view.index");
$router->get("/home", HomeView::class)->setName("view.home");

$router->post("/action/login", \Web\Action\LoginAction::class)->setName("action.test");
$router->post("/action/ajax", \Web\Action\AjaxAction::class)->setName("action.ajax");