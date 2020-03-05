<?php

namespace Rentit\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='users';
    protected $fillable=['email','password','name','lastname'];
    //default values
    protected $attributes=[
        'rol'=>1
    ];

    public  function properties(){
        return $this->hasMany('Rentit\Models\Property');
    }
}