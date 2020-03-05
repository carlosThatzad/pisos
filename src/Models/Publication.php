<?php


namespace Rentit\Models;


use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $table='publications';
    protected $fillable = ['name', 'description', 'price', 'status', 'ubicacion', 'meters', 'contact'];

public function user(){
    return $this->belongsTo('Rentit\Models\User');
}

    static function allInventory() {

        $inventory = Publication::all()->toArray();

        return $inventory;

    }
}