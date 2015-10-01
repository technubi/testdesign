<?php
namespace
App\Models;
use Illuminate\Database\Eloquent\Model;

class Smallwork extends Model {

    protected $table = 'smallwork';
    protected $fillable = ['nama','id','bigwork_id'];

    public function Bigwork(){
        return $this->belongsTo('App\Models\Bigwork','bigwork_id');
    }
    public function Detailwork(){
        return $this->hasMany('App\Models\Detailwork');
    }

}