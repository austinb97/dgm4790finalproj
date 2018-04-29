<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use Notifiable;
    // use Model;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // MY CODE UNDER HERE

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'uroles');
    }

    public function isUser()
    {
        $roles = $this->roles->toArray();
        return !empty($roles);
    }

    public function hasRole($check)
    {

        return in_array($check, array_pluck($this->roles->toArray(), 'name'));
    }

    public function getIdInArray($array, $term)
    {
        foreach($array as $key => $value){
            if($value == $term){
                return $key;
            }
        }
        throw new Exception;
    }

    public function makeUser($title)
    {
        $assigned_roles = array();
        $roles = array_pluck(Role::all()->toArray(), 'name');

        switch($title){
            case 'admin':
                $assigned_roles[] = $this->getIdInArray($roles, 'admin');
            case 'customer':
                $assigned_roles[] = $this->getIdInArray($roles, 'customer');
            break;
            default: throw new \Exception("The user status entered does not exist");
        }

        $this->roles()->attach($assigned_roles);
    }


}
