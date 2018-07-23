<?php namespace App\Http\Controllers;

use DB;
use App\SysConfig, App\Car, App\Driver, App\Task;
use Response,Request;
use Validator;

class ManageItemController extends Controller {

    public function __construct()
    {
        /*$this->beforeFilter('auth', array('except' => 'getLogin'));

        $this->beforeFilter('csrf', array('on' => 'post'));

        $this->afterFilter('log', array('only' => array('fooAction', 'barAction')));*/
        $this->middleware('auth');
    }

    public function showManage()
    {
        return view('manageitem0');
    }

    //################################### Driver ###################################
    public function getDrivers(){
        $resultArray = Driver::where('status', '=', 1)->get();
        $xx =  SysConfig::where('name', 'LIKE', 'DRIVER%')->get();


        return Response::json(array(
            'error' => false,
            'datas' => array('drivers' => $resultArray, 'sys'=> $xx)),
            200
        );
    }

    public function postAddDriver(){
        try {
            $driver = new Driver;

            $driver->car          = Request::Input('car');
            $driver->driver       = Request::Input('driver');
            $driver->start_date   = Request::Input('startDate');
            $driver->end_date     = Request::Input('endDate');
            $driver->num_date     = Request::Input('numDate');
            $driver->reserve_by   = Request::Input('reserve_by');
            $driver->user         = Request::Input('user');
            $driver->detail       = Request::Input('detail');
            $driver->status       = 1;

            $driver->save();

        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            return Response::json(array(
                'error' => true,
                'datas' => 'error'.$exc->getMessage()),
                200
            );
        }

        return Response::json(array(
            'error' => false,
            'datas' => 'complate'),
            200
        );
    }

    public function postUpdateDriver(){
        $driverId = Request::Input('pk');
        //$resultArray = Task::find($taskId);

        $rules = array(
            'pk'            => 'required|numeric',
            'name'          => 'required',
            'value'         => 'required'
        );
        $validator = Validator::make(Request::all(), $rules);

        // process the login
        if ($validator->fails()) {
            $messages   = $validator->messages();
            $errMsg     = "";
            foreach ($messages->all() as $message) {
                $errMsg .= $message."\n";
            }

            return Response::json(array(
                'error' => true,
                'msg' => $errMsg),
                200
            );

        } else {
            $field = Request::Input('name');

            if($field == "drivername"){
                // update
                $driver         = Driver::find($driverId);
                $driver->name   = Request::Input('value');
                $driver->save();

            }else if($field == "drivertel"){
                // update
                $driver         = Driver::find($driverId);
                $driver->tel    = Request::Input('value');
                $driver->save();
            }else if($field == "drivercolor"){
                // update
                /*$config         = SysConfig::where('name', '=', 'DRIVER_'.$driverId.'_COLOR')->get();
                $config->value  = Request::Input('value');
                $config->save();*/
                if(SysConfig::where('name', '=', 'DRIVER_'.$driverId.'_COLOR')->count() === 0){
                    $config         = new SysConfig;
                    $config->name   = 'DRIVER_'.$driverId.'_COLOR';
                    $config->ref    = $driverId;
                    $config->value  = Request::Input('value');
                    $config->save();

                }else{
                    SysConfig::where('name', '=', 'DRIVER_'.$driverId.'_COLOR')->update(array('value' => Request::Input('value')));

                }
            }
        }

        return Response::json(array(
            'error' => false,
            'datas' => 'complate'),
            200
        );
    }

    public function postDeleteDriver(){
        return Response::json(array(
            'error' => false,
            'datas' => 'complate'),
            200
        );
    }
    //################################## END Driver ########################################


    //################################### Car ###################################
    public function getCars(){
        $resultArray = Car::where('status', '=', 1)->get();

        return Response::json(array(
            'error' => false,
            'datas' => $resultArray),
            200
        );
    }

    public function postAddCar(){
        try {
            $car = new Car;

            $car->car          = Request::Input('car');
            $car->driver       = Request::Input('driver');
            $car->start_date   = Request::Input('startDate');
            $car->end_date     = Request::Input('endDate');
            $car->num_date     = Request::Input('numDate');
            $car->reserve_by   = Request::Input('reserve_by');
            $car->user         = Request::Input('user');
            $car->detail       = Request::Input('detail');
            $car->status       = 1;

            $car->save();

        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            return Response::json(array(
                'error' => true,
                'datas' => 'error'.$exc->getMessage()),
                200
            );
        }

        return Response::json(array(
            'error' => false,
            'datas' => 'complate'),
            200
        );
    }

    public function postUpdateCar(){
        $carId = Request::Input('pk');
        //$resultArray = Task::find($taskId);

        $rules = array(
            'pk'            => 'required|numeric',
            'name'          => 'required',
            'value'         => 'required'
        );
        $validator = Validator::make(Request::all(), $rules);

        // process the login
        if ($validator->fails()) {
            $messages   = $validator->messages();
            $errMsg     = "";
            foreach ($messages->all() as $message) {
                $errMsg .= $message."\n";
            }

            return Response::json(array(
                'error' => true,
                'msg' => $errMsg),
                200
            );

        } else {
            $field = Request::Input('name');

            if($field == "carplate"){
                // update
                $car                = Car::find($carId);
                $car->plate_number  = Request::Input('value');
                $car->save();

            }
        }

        return Response::json(array(
            'error' => false,
            'datas' => 'complate'),
            200
        );
    }

    public function postDeleteCar(){
        return Response::json(array(
            'error' => false,
            'datas' => 'complate'),
            200
        );
    }
    //################################## END Car ########################################


/*
    public function postDashboardData(){
        $date = Request::Input('date');
        $resultArray = array(
            'cars'          => Car::where('status', '=', 1)->get(),
            'drivers'       => Driver::where('status', '=', 1)->get(),
            'monthlyTask'   => Task::where('status', '=', 1)->where(function($query) {
                return $query->where(function($query) {
                    $date = Request::Input('date');
                    return $query->where(DB::raw('YEAR( `start_date` )'), '=', DB::raw('YEAR( \''.$date.'\' )'))->where( DB::raw('MONTH( `start_date` )'), '=', DB::raw('MONTH( \''.$date.'\' )'));
                })->orWhere(function($query) {
                    $date = Request::Input('date');
                    return $query->where(DB::raw('YEAR( `end_date` )'), '=', DB::raw('YEAR( \''.$date.'\' )'))->where(DB::raw('MONTH( `end_date` )'), '=', DB::raw('MONTH( \''.$date.'\' )'));
                });
            })->get(),
            'countCars'     => $this->countCars($date),
            'countDrivers'  => $this->countDrivers($date));

        $queries    = DB::getQueryLog();
        $last_query = end($queries);

        return Response::json(array(
            'error' => false,
            'datas' => $resultArray),
            //'query' => $last_query),
            200
        );
    }

    public function countCars($date)
    {
        $resultArray    = DB::select("SELECT task.car, sum(1) as \"count\", "
                . "SUM(DATEDIFF(IF(end_date > LAST_DAY('$date'), LAST_DAY(start_date), end_date), IF(start_date < DATE_FORMAT('$date','%Y-%m-01'), DATE_FORMAT('$date','%Y-%m-01'), start_date))+1) as total "
                . "FROM `task` WHERE status=1 AND ((YEAR( `start_date` ) = YEAR( '$date' ) AND MONTH( `start_date` ) = MONTH( '$date' )) or (YEAR( `end_date` ) = YEAR( '$date' ) AND MONTH( `end_date` ) = MONTH( '$date' ))) group by task.car");

        return $resultArray;
    }

    function countDrivers($date)
    {
        $data = preg_split("/-/", $date, 3);
        if($data[1] == "0"){
            $select = "SELECT task.driver, count(1) as \"count\", "
                    . "SUM(DATEDIFF("
                    . "IF(end_date > STR_TO_DATE(CONCAT(12,31,YEAR('$date')), '%Y%m%d'), LAST_DAY(start_date), end_date), "
                    . "IF(start_date < DATE_FORMAT('$date','%Y-01-01'), DATE_FORMAT('$date','%Y-01-01'), start_date))+1) as total "
                    . "FROM `task` WHERE status=1 AND (YEAR( `start_date` ) = YEAR( '$date' ) or YEAR( `end_date` ) = YEAR( '$date' )) group by task.driver";

        }else{
            $select = "SELECT task.driver, count(1) as \"count\", "
                    . "SUM(DATEDIFF(IF(end_date > LAST_DAY('$date'), LAST_DAY(start_date), end_date), IF(start_date < DATE_FORMAT('$date','%Y-%m-01'), DATE_FORMAT('$date','%Y-%m-01'), start_date))+1) as total "
                    . "FROM `task` WHERE status=1 AND ((YEAR( `start_date` ) = YEAR( '$date' ) "
                    . "AND MONTH( `start_date` ) = MONTH( '$date' )"
                    . ") or (YEAR( `end_date` ) = YEAR( '$date' ) "
                    . "AND MONTH( `end_date` ) = MONTH( '$date' )"
                    . ")) group by task.driver";
        }
        $resultArray    = DB::select($select);

        return $resultArray;
    }

    public function postDashboardConfig(){
        $resultArray = SysConfig::all();

        return Response::json(array(
            'error' => false,
            'datas' => $resultArray),
            200
        );
    }

    public function postReportResult(){
        $type   = Request::Input('type');
        $year   = Request::Input('year');
        $month  = Request::Input('month');
        $driver = Request::Input('driver');
        $date   = "$year-$month-01";

        if($type == 1){
            $resultArray = array(
                'drivers'       => Driver::where('status', '=', 1)->get(),
                'drivercount'   => $this->countDrivers($date),
                //'debug'         => $type,
                //'cars'          => Car::where('status', '=', 1)->get(),
                //'info'          => DB::select("select * from task where status = 1")
                );
        }else if($type == 2){
            //$resultArray = array();
            if($month == "0"){
                $query  = "select * from task where status=1 AND (YEAR( `start_date` ) = YEAR( '$date' ) or YEAR( `end_date` ) = YEAR( '$date' ))";
            }else{
                $query  = "select * from task where status=1 AND ((YEAR( `start_date` ) = YEAR( '$date' ) AND MONTH( `start_date` ) = MONTH( '$date' )) or (YEAR( `end_date` ) = YEAR( '$date' ) AND MONTH( `end_date` ) = MONTH( '$date' )))";
            }
            if($driver != "0"){
                $query .= " AND driver = $driver";
            }

            $resultArray = array(
                'drivers'       => Driver::where('status', '=', 1)->get(),
                'cars'          => Car::where('status', '=', 1)->get(),
                'debug'         => $driver,
                'tasks'         => DB::select($query)//Task::where('status', '=', 1)->get()
            );
        }

        return Response::json(array(
            'error' => false,
            'datas' => $resultArray),
            200
        );
    }*/


    // RESTfull ################################################################
    //##########################################################################
}
