<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {
	protected $fillable = [];

    protected $table = 'task';

    protected $guarded = array('id', 'account_id');

    //protected $hidden = [ 'car.ca'];
    protected $hidden = array('car:created_at', 'car:updated_at');

    public static $rules = [
        'create' => [
            'car'       => 'required',
            'driver'    => 'required',
            'start_date'=> 'required',
            'end_end'   => 'required',
            'num_date'  => 'required',
            'reserv_by' => 'required',
            'user'      => 'required'
            //'email'      => 'required|email|unique:users',
            //'password'   => 'required|min:5|confirmed'
        ],
        'edit'   => [
            'first_name' => 'other',
            'last_name'  => 'other',
            'email'      => 'other',
            'password'   => 'other|min:5'
        ]
    ];

    public function car()
    {
        return $this->hasOne('App\Car', 'id', 'car');
        //return $this->hasOne('App\Car', 'id', 'car')->get('car:name,car:plate_number,car:province');//->select('car.name', 'car.plate_number', 'car.province');
        //return $this->belongsTo('App\Car', 'car', 'id')->select(array('name', 'plate_number'));
        //return $this->belongsTo('App\Car', 'car', 'id')->pluck('car.name', 'car.plate_number', 'car.province');
        //return $this->belongsTo('App\Car', 'car', 'id')->exclude(['updated_at', 'created_at']);
    }

    public function driver()
    {
        return $this->hasOne('App\Driver', 'id', 'car');
    }

    public function reserveBy()
    {
        return $this->hasOne('App\UserInfo', 'id', 'reserve_by');
    }

    public function userInfo()
    {
        return $this->hasOne('App\UserInfo', 'id', 'requestor');
    }
    
}
