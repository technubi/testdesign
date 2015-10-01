<?php namespace
App\Models;

use Illuminate\Database\Eloquent\Model;

class Bigwork extends Model {

    protected $table = 'bigwork';
    protected $fillable = ['name','id'];

    public function Smallwork(){
        return $this->hasMany('App\Models\Smallwork');
    }
    public function tes(){
        return "halo";
    }



}
?>