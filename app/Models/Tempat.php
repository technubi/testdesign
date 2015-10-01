<?php
namespace
App\Models;
use Illuminate\Database\Eloquent\Model;

class Tempat extends Model {

    protected $table = 'tempats';
    protected $fillable = ['nama','deskripsi','contact', 'alamat', 'lat','long','akunfb','akuntw','akunig','owner_id','visit','kategori_id','mission_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */


    public static $rules = [
        'nama'                => 'required',
        'deskripsi'           => 'required|max:300',
        'contact'             => 'required',
        'alamat'              => 'required',
        'lat'                 => 'required',
        'long'                => 'required',

    ];

    public static $messages = [
        'nama.required'   => 'nama is required',
        'deskripsi.required'    => 'Deskripsi harus di isi',
        'alamat.required'       =>  'Alamat harus di isi',
        'notelp.required'       =>  'No Telepon harus di isi',
        'lat.required'    => 'Latitude harus di isi',
        'long.required'       =>  'Longitude harus di isi',



    ];
   public function Image(){
        return $this->hasMany('App\Models\Image','tempat_id');
    }
    public function Kategori(){
        return $this->belongsTo('App\Models\Kategori');
    }
    public function Mission(){
        return $this->belongsTo('App\Models\Mission');
    }
    public function Owner(){
        return $this->belongsTo('App\Models\Owner');
    }
}