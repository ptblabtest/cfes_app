<?php

namespace App\Http\Controllers;

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
