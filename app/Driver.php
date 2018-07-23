<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model {
	protected $fillable = [];
        protected $table = 'driver';

        public function task(){
                return $this->belongTo('App\Task','driver','id');
        }
}
