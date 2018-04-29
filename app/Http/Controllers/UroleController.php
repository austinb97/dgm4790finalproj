<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Urole;
use App\User;
use DB;

class UroleController extends Controller
{
    public function store()
    {
    	// $userId = DB::table('users')->orderBy('created_at', 'desc')->first();
    	$user = DB::table('users')->latest()->get()->first();

    	$urole = new Urole;    		
    	$urole->user_id = $user->id;
        $urole->role_id = 2;
    	$urole->save();

    	return redirect('/home');
    }

    public function updateRoles(Request $request)
    {        

        $users = DB::table('users')->join('uroles', 'users.id', '=', 'uroles.user_id')->join('roles', 'uroles.role_id', '=', 'roles.id')->select('users.id as userId', 'roles.name as role', 'roles.id as roleId')->get();

        $newRoles = $request->all();


        Urole::updateUroles($users, $newRoles);

        // foreach ($users as $user) {
            
        // }

        return redirect('/admin');
    }

}
