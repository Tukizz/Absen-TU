<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table = 'absen';

    public function Staff()
    {
    	return $this->belongsTo('App\Staff');
    }
}
