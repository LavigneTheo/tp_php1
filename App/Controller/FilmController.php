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

class FilmController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function all() {
        $films = $this->db->get_all('film', ['name', 'year', 'summary', 'category_id', 'realisator_id', 'image_path']);
        $categories = $this->db->get_all('category', ['id', 'name']);
        $realisators = $this->db->get_all('realisator', ['id', 'name', 'surname']);
        $categories = Utils::id_as_key($categories);
        $realisators = Utils::id_as_key($realisators);


        $this->render('film.list', [
            'films' => $films,
            'categories' => $categories,
            'realisators' => $realisators
        ]);
    }

    public function manage() {
        $categories = $this->db->get_all('category', ['id', 'name']);
        $realisators = $this->db->get_all('realisator', ['id', 'name', 'surname']);

        $this->render('film.manage',[
            'categories' => $categories,
            'realisators' => $realisators
            ]);
    }

    public function save() {
        $data = Utils::strip_tags($_POST);
        $id = $this->db->insert('film', $data);
        if($_FILES['file']['size'] == 0) {
            $path = '/public/img/film/default.png';
        } else {
            $path = Utils::writeFile($_FILES['file'], '/public/img/film/', "film-$id");
        }
        $this->db->update_from_id('film', ['image_path' => str_replace('/public/', '', $path)], $id);
        header('location:index.php');
        exit();
    }

    public function reset_database() {
        $this->db->reset();
        header('location:index.php');
        exit();
    }

}