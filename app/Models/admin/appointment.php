<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    use HasFactory;
    
    public function doctors(){
        return $this->belongsTo('App\Models\Doctor');
    }


}
