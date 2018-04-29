<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Urole;
use DB;

class Urole extends Model
{

	    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'role_id', 'created_at', 'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'password', 'remember_token',
    ];

    // MY CODE UNDER HERE
    
	public static function updateUroles($users, $request)
	{
		foreach ($users as $user) {

			$newRoleText = $request['update'.$user->userId];

			// $roleIdConvert = $user->roleId->where($user->role, $newRoleText);

			// $roleIdConvert = User::where($user->role, $newRoleText);

			if($newRoleText == 'admin'){
				// $newRoleNum = 1;
				// Urole::where('user_id', $user->userId)->first()->update(['role_id', $newRoleNum]);
				$update = Urole::where('user_id', '=', $user->userId)->first();
				$update->role_id = 1;
				$update->save();
			}else{
				// $newRoleNum = 2;
				// Urole::where('user_id', $user->userId)->first()->update('role_id', $newRoleNum);
				$update = Urole::where('user_id', '=', $user->userId)->first();
				$update->role_id = 2;
				$update->save();
			}


            // Urole::where('user_id', $user->userId)->update(['role_id', $newRoleNum]);
        }
	}

}
