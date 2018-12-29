<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 28/12/2018
 * Time: 00:29
 */

namespace App\Controller;

use App\Database;

defined('ACCESSIBLE') or die('No direct script access.');

class  Controller {

    protected $viewpath = ROOT.'\Views';
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Render the whole page, assembling templates with the content
     * @param $view Path from the 'Views' folder to the html content
     * @param array $data
     */
    protected function render($view ,$data = []) {
        ob_start();
        !empty($data) ? extract($data) : false;
        require($this->viewpath.str_replace('.', '\\', '\\'.$view).'.php');
        $content = ob_get_clean();
        require $this->viewpath.'\template\default.php';
    }

}

