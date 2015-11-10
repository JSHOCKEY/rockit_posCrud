<?php
namespace App\Models;

use DB;

class Item extends Model {
    protected static $table = 'item';

    public function delete() {
        DB::delete('delete from item where id = ?', [$this->id]);
    }
}
