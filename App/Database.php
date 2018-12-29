<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 27/12/2018
 * Time: 21:45
 */

namespace App;

use \PDO;

defined('ACCESSIBLE') or die('No direct script access.');

class Database
{

    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('sqlite:' . ROOT . '\film.sqlite3');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->query('PRAGMA foreign_keys = ON;');
        } catch (\Exception $e) {
            exit('Error \App\Database::__construct : ' . $e->getMessage());
        }
    }

    public function reset() {
        $query = file_get_contents(ROOT . '\App\db.sql');
        $this->pdo->exec($query);
    }

    public function insert($table, $arr)
    {
        $keys = [];
        $values = [];
        foreach ($arr as $key => $val) {
            $keys[] = ":$key";
            $values[$key] = $val;
        }

        $keys_TABLE = str_replace(':', '', implode(', ', $keys));
        $keys_VALUES = implode(', ', $keys);

        $query_str = "INSERT INTO $table($keys_TABLE) VALUES($keys_VALUES);";

        try {
            $query = $this->pdo->prepare($query_str);
            $query->execute($values);
        } catch (\Exception $e) {
            exit('Error \App\Database::insert : ' . $e->getMessage());
        }

        return $this->pdo->lastInsertId();
    }

    public function get_all($table, $fields)
    {
        $fields_str = implode(', ', $fields);
        try {
            $query_str = "SELECT $fields_str FROM $table";
            $data = $this->pdo->query($query_str);
            $data->setFetchMode(PDO::FETCH_OBJ);
            $data = $data->fetchAll();
        } catch (\Exception $e) {
            exit('Error \App\Database::get_all : ' . $e->getMessage());
        }

        return $data;
    }

    public function query($query, $args = [], $fetch = false)
    {
        try {
            $req = $this->pdo->prepare($query);
            $req->execute($args);
        } catch (\Exception $e) {
            exit('Error \App\Database::query : ' . $e->getMessage());
        }

        if ($fetch) {
            return $req->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public function update_from_id($table, $set, $id)
    {
        $set_arr = [];
        $set_values = [];
        foreach ($set as $key => $val) {
            $set_arr[] = $key . '=:' . $key;
            $set_values[$key] = $val;
        }
        $set_str = implode(', ', $set_arr);
        $query_str = "UPDATE $table SET $set_str WHERE id = $id";

        try {
            $req = $this->pdo->prepare($query_str);
            $req->execute($set_values);
        } catch (\Exception $e) {
            exit('Error \App\Database::update_from_id : ' . $e->getMessage());
        }
    }

    public function delete_from_id($table, $id) {
        $query_str = "DELETE FROM $table WHERE id=:id";
        try {
            $req = $this->pdo->prepare($query_str);
            $req->execute(['id' => $id]);
        } catch (\Exception $e) {
            exit('Error \App\Database::delete_from_id : ' . $e->getMessage());
        }
    }
}