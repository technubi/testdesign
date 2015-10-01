<?php namespace
App\Models;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model {

    protected $table = 'missions';
    protected $fillable = ['mission','id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */


    public static $rules = [
        'mission'                => 'required',
    ];

    public static $messages = [
        'mission.required'   => 'mission is required',
    ];
    public function Tempat(){
        return $this->hasMany('App\Models\Tempat','mission_id');
    }
    /*public function Owner(){
        return $this->belongsTo('App\Models\Owner');
    }*/

}
