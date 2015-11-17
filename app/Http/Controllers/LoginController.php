<?php

namespace App\Http\Controllers;

use Hash;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class LoginController
 * @package App\Http\Controllers
 */
class LoginController extends Controller
{

    /**
     * Process a login HTTP POST
     *
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request) {
     //
       //dd($request->all());
     //\Debugbar::info("Ok entra a postlogin");
      // echo("Ok entra a postlogin 2");

        $this->validate($request, [
            'password' => 'required'
        ]);

       if ($this->login($request->email,$request->password)) {
           //REDIRECT TO HOME
           return redirect()->route('auth.home');
       } else {
           $request->session()->flash('login_error',
               'Login incorrecte');
           //REDIRECT BACK
           return redirect()->route('auth.login');
       }
   }

    /**
     * @return \Illuminate\View\View
     */

    /**
     * @param $email
     * @param $password
     * @return bool
     */
    private function login($email, $password)
    {
        //TODO: Mirar bé a la base de dades

        //$user = User::findOrFail(id);
        //$user = User::all();
        $user = User::where('email', $email)->first();

        if ($user == null) {
            return false;
        }

        if (Hash::check($password, $user->password)) {
            return true;
        } else {
            return false;
        }
    }

        public function getLogin() {
        return view('login');
    }

}
