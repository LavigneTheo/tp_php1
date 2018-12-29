<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 28/12/2018
 * Time: 01:47
 */

namespace App;

defined('ACCESSIBLE') or die('No direct script access.');

class Utils {

    public static function id_as_key($obj_arr) {
        $array = [];
        foreach ($obj_arr as $obj) {
            $array[$obj->id] = $obj;
        }

        return $array;
    }

    public static function var_d($data) {
        echo '<pre>' , var_dump($data) , '</pre>';
    }

    public static function get_extension($file) {
        return explode('/' ,$file['type'])[1];
    }

    public static function writeFile($file, $save_location, $name) {
        $save_location = str_replace('\\', '/', $save_location);
        $extension = self::get_extension($file);
        if(move_uploaded_file($file['tmp_name'], ROOT.$save_location.$name.".$extension")){
            return $save_location.$name.".$extension";
        }
        return false;
    }

    public static function strip_tags($data) {
        foreach ($data as $key => $d) {
            $data[$key] = strip_tags($d);
        }
        return $data;
    }
}