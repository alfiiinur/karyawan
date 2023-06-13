<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectAuthenticatedUsersController extends Controller
{
    public function home()
    {
        if (auth()->user()->level == 'admin') {
            return redirect('/adminDashboard');
        }
        elseif(auth()->user()->level == 'user'){
            return redirect('/userDashboard');
        }
        else{
            return auth()->logout();
        }
    }
}
