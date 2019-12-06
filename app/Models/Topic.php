<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use \Esensi\Model\Model;

class Topic extends Model
{
   protected $primeryKey='id';
   protected $table='topics';
   protected $fillable=['owner','topicname','created_at','updated_at'];
   protected $rules=[
            'topicname'=>['required','min:4','max:128']
   ];
}
