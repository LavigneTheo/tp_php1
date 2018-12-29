<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 27/12/2018
 * Time: 22:01
 */

namespace App;

defined('ACCESSIBLE') or die('No direct script access.');

class  Autoloader {
    public static function register() {
        spl_autoload_register(array(__CLASS__, 'myloader'));
    }
    public static function myloader($class) {
        $path = str_replace("\\", "/",ROOT.'/'.$class.'.php');
        require $path;
    }
}