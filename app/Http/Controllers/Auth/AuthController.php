<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    
    protected function getLogin() {
        return View('auth.login');
    }

    protected function postLogin(LoginRequest $request) {
        if ($this->auth->attempt($request->only('email', 'password'))) {
                return redirect()->route('/');
           //      return redirect('/course/index');
          
        }
 
        return redirect('auth/login')->withErrors([
            'email' => 'The email or the password is invalid. Please try again.',
        ]);
    }

    protected function getRegister() {
        return View('auth.register');
    }

    protected function postRegister(RegisterRequest $request) {
        $this->user->name = $request->name;
        $this->user->email = $request->email;
        $this->user->password = bcrypt($request->password);
        $this->user->save();
        return redirect('auth.login');
    }

    
  protected function getLogout()
    {
        $this->auth->logout();
        return redirect('auth.login'); 
    } 
    protected $redirectTo = 'course';
    protected $loginPath = '/auth/login';

}
