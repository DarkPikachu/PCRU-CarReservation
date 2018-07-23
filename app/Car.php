<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model {
	protected $fillable = [];
        protected $table = 'car';

        public function task(){
                return $this->belongTo('App\Task','car','id')->select('car.name', 'car.plate_number', 'car.province');
        }
}
