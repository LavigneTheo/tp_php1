<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 27/12/2018
 * Time: 21:33
 */


define('ACCESSIBLE', '1');
define('ROOT', str_replace('\\', '/', dirname(__DIR__)));
ini_set('display_errors',1);

require ROOT.'/App/autoload.php';
\App\Autoloader::register();

isset($_GET['p']) ? $page = $_GET['p'] : $page = "film.all";
$page = explode('.' ,$page);

$controller = '\App\Controller\\'.ucfirst($page[0]).'Controller';
$controller = new $controller();

$action = $page[1];
$controller->$action();

