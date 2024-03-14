<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function dashboard2()
    {

        return Inertia::render('Display/Dashboard/DashboardMaps', [

            'auth' => ['user' => auth()->user()->load('roles')],
        ]);
    }
}
