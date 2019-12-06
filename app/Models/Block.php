<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
   protected $primeryKey='id';
   protected $table='blocks';
   protected $fillable=['title','topicid','content','imagepath','created_at','updated_at'];
}
