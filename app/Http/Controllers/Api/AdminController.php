<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $redirectTo;
    public function redirectTo()
    {
        switch(Auth::user()->role){
            case 2:
                $this->redirectTo = '/admin';
                return $this->redirectTo;
                break;
            case 4:
                $this->redirectTo = '/team';
                return $this->redirectTo;
                break;
            case 3:
                $this->redirectTo = '/player';
                return $this->redirectTo;
                break;
            case 5:
                $this->redirectTo = '/academy';
                return $this->redirectTo;
                break;
            case 6:
                $this->redirectTo = '/scout';
                return $this->redirectTo;
                break;
            case 1:
                $this->redirectTo = '/superadmin';
                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
        }

        // return $next($request);
    }
}
