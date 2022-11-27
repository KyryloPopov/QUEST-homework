<?php

namespace application\models;

use application\core\Model;

class Conference extends Model
{

    public $error;

    //Добавить запись
    public function conferenceInsert($post)
    {
        $array = [
            "title" => $post['title'],
            "data" => $post['date'],
            "latitude" => $post['latitude'],
            "longitude" => $post['longitude'],
            "country" => $post['country'],
        ];
        $result = $this->db->query("INSERT INTO conferences (title, date, latitude, longitude, country) VALUES (:title, :data, :latitude, :longitude, :country)", $array);
        return $result;
    }

    //Редактировать запись
    public function conferenceEdit($post, $id)
    {
        $array = [
            "id" => $id,
            "title" => $post['title'],
            "date" => $post['date'],
            "latitude" => $post['latitude'],
            "longitude" => $post['longitude'],
            "country" => $post['country'],
        ];
        $this->db->query('UPDATE conferences SET title = :title, date = :date, latitude = :latitude, longitude = :longitude, country = :country WHERE id = :id', $array);
    }

    //Проверка существования записи
    public function conferenceExist($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->db->table("SELECT id FROM conferences WHERE id = :id", $params);
    }

    //Валидация данных в create и edit
    public function conferenceValidate($post)
    {
        if (strlen($post['title']) < 3 || strlen($post['title']) > 255) {
            $this->error = 'The name of the conference must contain from 3 to 255 characters!';
            return false;
        } else if ($post['date'] == '') {
            $this->error = 'Conference date not specified!';
            return false;
        } else if ($this->coordInputCheck($post['latitude']) || $post['latitude'] < -90 || $post['latitude'] > 90 || $this->coordInputCheck($post['longitude']) || $post['longitude'] < -180 || $post['longitude'] > 180) {
            $this->error = 'Incorrect coordinates!';
            return false;
        } else if ($post['country'] == "Select country") {
            $this->error = 'Country not specified!';
            return false;
        }
        return true;
    }

    //Дополнительные параметры валидации координат
    public function coordInputCheck($str){
        return !(is_numeric($str) && strlen($str) > 1);
    }


    //Достать данные одной записи из БД
    public function getConferenceData($id)
    {
        $array = [
            "id" => $id,
        ];
        $result = $this->db->table("SELECT * FROM conferences WHERE id = :id", $array);
        return $result;
    }

    //Удаление записи
    public function conferenceDelete($id)
    {
        $array = [
            "id" => $id,
        ];
        $result = $this->db->query("DELETE FROM conferences WHERE id = :id", $array);
        return $result;
    }

    //Список стран для выпадающего списка
    public function getCountries()
    {
        $vars = require "application/config/countries.php";
        sort($vars);
        return $vars;
    }
}
