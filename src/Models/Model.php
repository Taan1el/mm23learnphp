<?php

namespace App\Models;

use App\DB;

abstract class Model {
    public static $table;
    public $id;
    public static function all() {
        $db = new DB();
        return $db->all(static::$table, static::class);
    }

    public static function find($id) {
        $db = new DB();
        return $db->find(static::$table, static::class, $id);
    }

    public static function where($field, $value) {
        $db = new DB();
        return $db->where(static::$table, static::class, $field, $value);
    }


    public function save() {
        $db = new DB();
        $fields = get_object_vars($this);
        unset($fields['id']);
        if($this->id) {
            $db->update(static::$table, $fields, $this->id);
        } else {
            $db->insert(static::$table, $fields);
        }
    }

    public function delete(){
        $db = new DB();
        $db->delete(static::$table, $this->id);
    }
}