<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AuthController extends Controller
{
    public function login():RedirectResponse
    {
     $user = User::find(1);

    if (!$user) {
        return redirect()->route('login')->withErrors(['Usuário com ID 1 não encontrado.']);
    }

     Auth::login($user);

      return redirect()->route('home');
    }

    
    public function logout():RedirectResponse
    {
      
       Auth::logout();
       return redirect()->route('home');
    }

    public function onlyAdmin(){
      
       //usando a gate para verificar se o usuario é admin
       

        /*
       
         if (!Gate::allows('user_is_admin')) {
          //se não for admin
           echo 'Voce não é um administrador.';
        } else {
             //se for admin
           echo 'Você é um administrador, bem-vindo!';
        }
      */

        //testando usando o Auth 
    
         if(Auth::user()->can('user_is_admin')){
           echo 'Você é um administrador, bem-vindo!';
         } else {
          echo 'Voce não é um administrador.';
         }
       
  }

  public function onlyUser(){
         if(Gate::allows('user_is_user')){
           echo 'Você é um usuario comum, bem-vindo!';
         } else {
          echo 'Voce não é um admin.';
         }
    
 }
}