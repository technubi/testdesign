<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Admin extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name','last_name', 'email', 'alamat','notelp','noktp','password','remember_token'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public static $rules = [
        'first_name'            => 'required',
        'last_name'             => 'required',
        'email'                 => 'required|email',
        'alamat'                => 'required',
        'notelp'                => 'required',
        'passwordnow'              => 'required|same:"xxxxxxx"}',
        'password'              => 'required|min:6|max:20',
        'password_confirmation' => 'required|same:password',
        'g-recaptcha-response'  => 'required'
    ];

    public static $messages = [
        'first_name.required'   => 'First Name is required',
        'last_name.required'    => 'Last Name is required',
        'alamat.required'       =>  'Adress is required',
        'notelp.required'       =>  'Your phone number is required',
        'email.required'        => 'Email is required',
        'email.email'           => 'Email is invalid',
        'password.required'     => 'Password is required',
        'password.min'          => 'Password needs to have at least 6 characters',
        'password.max'          => 'Password maximum length is 20 characters',
        'g-recaptcha-response.required' => 'Captcha is required'
    ];


}
