<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Logic\User\UserRepository;

//use Illuminate\Contracts\Auth\Guard;

use App\Models\Admin;
use App\Models\Social;

use Hash;
use App\Models\Role;
use Input, Validator;
//use App\Http\Controllers\Auth;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\SocialiteServiceProvider;
use DB;

use Auth;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Traits\CaptchaTrait;


class AuthController extends Controller {

    use CaptchaTrait;

    //protected $auth;

    protected $userRepository;

    use AuthenticatesAndRegistersUsers;
    /*public function __construct()
    {
        $this->userRepository = $userRepository;
    }*/


    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
     */
    public function __construct(Registrar $registrar,UserRepository $userRepository )
    {
//        $this->auth = Auth::owner();
        $this->registrar = $registrar;
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->userRepository = $userRepository;
    }

    /*--------------------------------------------------------------*/
    /*LOGIN SYSTEM*/
    /*public function getLogin()
    {
        return view('auth.login');
    }
    public function getLoginOwner()
    {
        return view('auth.loginOwner');
    }*/
    /*public function postLogin()
    {
        $email      = Input::get('email');
        $password   = Input::get('password');
        $remember   = Input::get('remember');

       if(Auth::owner()->attempt([
            'email'     => $email,
            'password'  => $password
        ], $remember == 1 ? true : false))
        {
            return redirect()->route('auth.login');
        }
        else
        {
            return redirect()->back()
                ->with('message','Incorrect email or password')
                ->with('status', 'danger')
                ->withInput();
        }

    }*/
    public function getLogout()
    {
        if(Auth::admin()->check())
            Auth::admin()->logout();
        return redirect()->route('auth.login')
            ->with('status', 'success')
            ->with('message', 'Logged out');

    }
    public function postLoginAdmin(){
        $email      = Input::get('email');
        $password   = Input::get('password');
        $remember   = Input::get('remember');

        if(Auth::admin()->attempt([
            'email'     => $email,
            'password'  => $password
        ], $remember == 1 ? true : false))
        {
            return redirect()->route('adminHome');
        }
        else
        {
            return redirect()->back()
                ->with('message','Incorrect email or password')
                ->with('status', 'danger')
                ->withInput();
        }
    }
    public function getLoginAdmin(){
        return view('auth.loginadmin');
    }
    /*END LOGIN SYSTEM*/


/*REGISTRY UNTUK ADMIN*/
    public function getAddAdmin(){
        return view('auth.addAdmin');
    }
    public function postAddAdmin(){
        $input = Input::all();
        $validator = Validator::make($input, Admin::$rules, Admin::$messages);
        if($validator->fails())
        {
            redirect()->back()
                ->withErrors($validator)
                ->withInput();
            //email tidak boleh sama

        }
        if($this->captchaCheck() == false)
        {
            return redirect()->back()
                ->withErrors(['Wrong Captcha'])
                ->withInput();

        }
        $dataadmin = [
            'first_name'    => $input['first_name'],
            'last_name'     => $input['last_name'],
            'email'         => $input['email'],
            'password'      => $input['password'],
            'notelp'        => $input['notelp'],
            'alamat'        => $input['alamat'],

        ];

        $this->userRepository->registeradmin($dataadmin);

        return redirect()->route('auth.loginadmin')
            ->with('status', 'success')
            ->with('message', 'You are registered successfully. Please login.');



        //return View('owner.index');
    }
    public function editAdmin(){
        $input = Input::all();
        $validator = Validator::make($input, Admin::$rules, Admin::$messages);
        if($validator->fails())
        {
            redirect()->back()
                ->withErrors($validator)
                ->withInput();
            //email tidak boleh sama

        }
        if($this->captchaCheck() == false)
        {
            return redirect()->back()
                ->withErrors(['Wrong Captcha'])
                ->withInput();

        }
        $user = Admin::where('id','=', Auth::admin()->get()['id'])->first();
        if(Hash::check($input['passwordnow'],$user->password)){
            $dataadmin = [
                'id'            => Auth::admin()->get()['id'],
                'first_name'    => $input['first_name'],
                'last_name'     => $input['last_name'],
                'email'         => $input['email'],
                'password'      => $input['passwordnow'],
                'notelp'        => $input['notelp'],
                'alamat'        => $input['alamat'],

            ];

            $this->userRepository->patchadmin($dataadmin);

            return redirect()->route('auth.loginadmin')
                ->with('status', 'success')
                ->with('message', 'Your update finish.');
        }
        else{
            return redirect()->back()
                ->withErrors(['Wrong Current Password'])
                ->withInput();
        }

    }
    /*END REGISTER ADMIN*/
/*--------------------------------------------------------------*/
    /*SOCIAL MEDIA LOGIN*/
    public function getSocialRedirect( $provider )
    {
        $providerKey = \Config::get('services.' . $provider);
        if(empty($providerKey))
            return view('pages.status')
                ->with('error','No such provider');

        return Socialite::driver( $provider )->redirect();

    }

    public function getSocialHandle( $provider )
    {
        $user = Socialite::driver( $provider )->user();

        $socialUser = null;

        //Check is this email present
        debug($user);
        $userCheck = User::where('email', '=', $user->email)->first();
        debug($userCheck);
        if(!empty($userCheck))
        {

             Auth::user()->login($userCheck , true);
            /*Auth::client()->attempt(array(
                'email'     => 'sand.xxx.new@gmail.com',
                'password'  => 'facebok',
            ));*/
            return redirect()->route('auth.login');
        }
        else
        {

            /*ketemu di database*/
            /*cek di table socialid*/
            /*$sameSocialId = Social::where('social_id', '=', $user->id)->where('provider', '=', $provider )->first();

            if(empty($sameSocialId))
            {
                //There is no combination of this social id and provider, so create new one
                $newSocialUser = new User;
                $newSocialUser->email              = $user->email;
                $name = explode(' ', $user->name);
                $newSocialUser->first_name         = $name[0];
                $newSocialUser->last_name          = $name[1];
                $newSocialUser->save();

                $socialData = new Social;
                $socialData->social_id = $user->id;
                $socialData->provider= $provider;
                $newSocialUser->social()->save($socialData);

                // Add role
                $role = Role::whereName('member')->first();
                $newSocialUser->assignRole($role);

                $socialUser = $newSocialUser;
            }
            else
            {
                //Load this existing social user
                $socialUser = $sameSocialId->user;
            }*/
            return View('errors.notfound');

        }

        /*$role = Role::whereId($socialUser['id'])->first();

        $this->auth->login($socialUser, true);*/


       /* if( $this->auth->user()->hasRole('user'))
        {


        }

        if( $this->auth->user()->hasRole('administrator'))
        {
            return redirect()->route('admin.home');
            //return view('admin.index');
        }*/

        return \App::abort(500);
    }
    /*END SOCIAL MEDIA LOGIN*/
}