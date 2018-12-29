<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 28/12/2018
 * Time: 00:36
 */

namespace App\Controller;

use App\Utils;

defined('ACCESSIBLE') or die('No direct script access.');

class CategoryController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function manage() {
        $categories = $this->db->get_all('category', ['id','name']);

        $this->render('category.manage', [
            'categories' => $categories
        ]);
    }

    public function save() {
        $data = Utils::strip_tags(['name' => $_POST['name']]);
        $this->db->insert('category', $data);
        header('location:index.php?p=category.manage');
        exit();
    }

    public function edit() {
        $data = Utils::strip_tags(['name' => $_POST['name']]);
        $this->db->update_from_id('category', $data,$_POST['id']);
        header('location:index.php?p=category.manage');
        exit();
    }

    public function delete() {
        $this->db->delete_from_id('category', $_GET['id']);
        header('location:index.php?p=category.manage');
        exit();
    }
}