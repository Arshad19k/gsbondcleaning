<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if(Auth::user()->is_admin != 1) {
            return redirect()->route('orderList');
        }

        $user = User::where('is_admin', 0)->where('deleted', 0)->where('status', 1)->count();
        
        $pendingOrder = Order::where('deleted', 0)->where('status', 1)->count();
        $runningOrder = Order::where('deleted', 0)->where('status', 2)->count();
        $completedOrder = Order::where('deleted', 0)->where('status', 3)->count();



        return view('dashboard', compact(['user', 'pendingOrder', 'runningOrder', 'completedOrder']));
    }
}
