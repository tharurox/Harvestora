<?php

namespace App;
use App\Thread;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $gaureded=[];

    public function threads(){

        return $this->belongsToMany(Thread::class);
    }
}
