<?php 
namespace App\Models;

use DB;
use Carbon\Carbon;

class Customer extends Model {
    protected static $table = 'customer';

    public function fullName() {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function funkySinceDate() {
        $date = new Carbon($this->customer_since);
        if($date->gt(Carbon::create(2009))) {
            return $date->year;
        } elseif($date->between(Carbon::create(2000), Carbon::create(2009))) {
            return 'Oh-' . ($date->year % 10);
        } elseif($date->between(Carbon::create(1990), Carbon::create(1999))) {
            return 'ninety-' . ($date->year % 10);
        } elseif($date->between(Carbon::create(1980), Carbon::create(1989))){
            return 'eighty-' . ($date->year % 10);
        } elseif($date->between(Carbon::create(1970), Carbon::create(1979))){
            return 'UNIX-' . ($date->year % 10);            
        } else {
            return 'forever';
        }
    }

    public function delete() {
        DB::delete('delete from customer where id = ?', [$this->id]);
    }

}