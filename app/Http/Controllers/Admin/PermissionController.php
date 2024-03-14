<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
            $users = User::with('roles')->get();

            $fields = [
                'name' => ['label' => 'Name', 'type' => 'text'],
                'email' => ['label' => 'Email', 'type' => 'email'],
                'role' => [
                    'label' => 'Role', 
                    'type' => 'role',
                    'options' => Role::all()->pluck('name'),
                ],
            ];

            return Inertia::render('Permission/Permissions', [
                'items' => $users,
                'fields' => $fields,
                'entity' => 'users'
            ]);
        }
    
    public function changeRole(Request $request)
    {
        $request->validate([
            'userId' => 'required|exists:users,id',
            'newRole' => 'required|exists:roles,name'
        ]);

        $user = User::find($request->userId);
        $user->syncRoles($request->newRole);

        return Redirect::back()->with('message', 'Role updated successfully');
    }



}
