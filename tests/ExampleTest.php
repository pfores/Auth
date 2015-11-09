<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Hola Pau');
    }

    /*
     * Check login page
     *
     */
    public function testLoginPage()
    {
        $this->visit(route('auth.login'))
                ->see('LOGIN');
    }

    /*
   * Check that a user without access go to login page
   *
   */
    public function testUserWithoutAccessToResource()
    {
            $this->unlogged();
            $this->visit('/resource')
            ->seePageIs(route('auth.login'))
            ->see('Login')
            ->dontSee('Logout');
        //->seePageIs('/login');
    }

    /*
   * Check that a user with access go to login page
   *
   */

    public function testUserWithAccessToResource()
    {
        $this->logged();
        $this->visit('/resource')
            ->seePageIs('/resource');
    }

    private function logged()
    {
        Session::set('authenticated',true);
    }
    private function unlogged()
    {
        Session::set('authenticated',false);
    }

    public function testLoginPageHaveRegisterLinkAndWorksOk()
    {
        $this->visit('/login')
            ->click('Register')
            ->seePageIs('/register');
    }

    public function testPostLoginOk()
    {
        $this->visit('/login')
            ->type('pfores92@gmail.com', 'email')
            ->type('23456','password')
            ->check('remember')
            ->press('login')
            ->seePageIs('/home');
    }

    public function testPostLoginNotOk()
    {
        $this->visit('/login')
            ->type('pepitapalotes@gmail.com', 'email')
            ->type('23456','password')
            ->check('remember')
            ->press('login')
            ->seePageIs('/home');
    }


}
