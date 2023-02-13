<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'surname', 'birthdate','sex','birthplace'];

    public static function getYears($x){
        $then_ts = strtotime($x);
        $then_year = date('Y', $then_ts);
        $age = date('Y') - $then_year;
        if(strtotime('+' . $age . ' years', $then_ts) > time()) $age--;
        return $age;
    }
    public static function getSex($x){
        if($x == 0) {
            return "Male";
        }
        else{
            return "Female";
        }
    }
}
