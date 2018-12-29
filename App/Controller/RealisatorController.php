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

class RealisatorController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function manage() {
        $realisators = $this->db->get_all('realisator', ['id','name', 'surname', 'dob']);
        $this->render('realisator.manage', [
            'realisators' => $realisators
        ]);
    }

    public function save() {
        $data = Utils::strip_tags(['name' => $_POST['name'], 'surname' => $_POST['surname'], 'dob' => $_POST['dob']]);
        $this->db->insert('realisator', $data);
        header('location:index.php?p=realisator.manage');
        exit();
    }

    public function edit() {
        $data = Utils::strip_tags(['name' => $_POST['name'], 'surname' => $_POST['surname'], 'dob' => $_POST['dob']]);
        $this->db->update_from_id('realisator', $data,$_POST['id']);
        header('location:index.php?p=realisator.manage');
        exit();
    }

    public function delete() {
        $this->db->delete_from_id('realisator', $_GET['id']);
        header('location:index.php?p=realisator.manage');
        exit();
    }
}