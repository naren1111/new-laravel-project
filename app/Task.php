<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [ 'title', 'description'];
    protected $table='tasks';
    
    /*public function scopeSeacrh($query, $search)
    {
        return $query->where('title', 'like', '%' . $search . '%');
    }*/
}
