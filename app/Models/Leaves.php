<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaves extends Model
{
    use HasFactory;
    public function leaveircles()       {

//         1 leave has many leave types
        return $this->hasMany(LeaveCircles::class,'laeve_type_id','id');
    }
}
