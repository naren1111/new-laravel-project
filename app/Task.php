<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [ 'title', 'description', 'categori_id','image_url'];
    protected $table='tasks';
    
    /*public function scopeSeacrh($query, $search)
    {
        return $query->where('title', 'like', '%' . $search . '%');
    }*/
}
