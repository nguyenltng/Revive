<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function role(Request $request)
    {

        User::query()->find(5)->assignRole(Role::query()->find(3));
    }


}
