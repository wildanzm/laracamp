<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;
use Auth;

class HomeController extends Controller
{
    public function dashboard()
    {
        $checkouts = Checkout::with('Camp')->whereUserId(Auth::id())->get();

        return view('user.dashboard', [
            'checkout' => $checkouts
        ]);
    }
}
