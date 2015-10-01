<?php namespace App\Logic\User;

use App\Logic\Mailers\UserMailer;
use App\Models\Role;
use App\Models\User;
use App\Models\Owner;
use App\Models\Admin;
use App\Models\Password;
use Hash, Carbon\Carbon;

class UserRepository {

    protected $userMailer;

    public function __construct( UserMailer $userMailer )
    {
        $this->userMailer = $userMailer;
    }

    public function register( $data )
    {

        $user = new User;
        $user->email            = $data['email'];
        $user->first_name       = ucfirst($data['first_name']);
        $user->last_name        = ucfirst($data['last_name']);
        $user->alamat           = $data['alamat'];
        $user->notelp           = $data['notelp'];
        $user->pending           = $data['pending'];
        $user->point           = 0;
        /*$user->password         = Hash::make($data['password']);*/
        $user->save();



    }
    public function registeradmin( $data )
    {

        $admin = new Admin;
        $admin->email            = $data['email'];
        $admin->first_name       = $data['first_name'];
        $admin->last_name        = $data['last_name'];
        $admin->alamat           = $data['alamat'];
        $admin->notelp           = $data['notelp'];
        $admin->password         = Hash::make($data['password']);

        $admin->save();

        //Assign Role
    }

    public function patchadmin($data){
        $admin = Admin::find($data['id']);
        $admin->email            = $data['email'];
        $admin->first_name       = $data['first_name'];
        $admin->last_name        = $data['last_name'];
        $admin->alamat           = $data['alamat'];
        $admin->notelp           = $data['notelp'];
        $admin->password         = Hash::make($data['password']);
        $admin->save();

    }
    public function patchuser($data){
        $owner = User::find($data['id']);
        $owner->email            = $data['email'];
        $owner->first_name       = ucfirst($data['first_name']);
        $owner->last_name        = ucfirst($data['last_name']);
        $owner->alamat           = $data['alamat'];
        $owner->notelp           = $data['notelp'];
        $owner->password            =Hash::make($data['password']);
        $owner->save();

    }
    public function resetPassword( User $user  )
    {
        $token = sha1(mt_rand());
        $password = new Password;
        $password->email = $user->email;
        $password->token = $token;
        $password->created_at = Carbon::now();
        $password->save();

        $data = [
            'first_name'    => $user->first_name,
            'token'         => $token,
            'subject'       => 'Example.com: Password Reset Link',
            'email'         => $user->email
        ];

        $this->userMailer->passwordReset($user->email, $data);
    }
}