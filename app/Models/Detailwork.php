<?php namespace
App\Models;

use Illuminate\Database\Eloquent\Model;

class detailwork extends Model {

    protected $table = 'detailwork';
    protected $fillable = ['nama','id','smallwork_id','location','client','designcom','buildcom','sitearea','floorarea','floor','external','created_at','updated_at','detail'];

    public function Smallwork(){
        return $this->belongsTo('App\Models\Smallwork');
    }
    public function Image(){
        return $this->hasMany('App\Models\Image');
    }




}
?>