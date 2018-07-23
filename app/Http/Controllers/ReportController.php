<?php namespace App\Http\Controllers;

use DB;
use App\Car, App\Driver, App\Task;
use Response,Request;

class ReportController extends Controller {

    public function __construct()
    {
        /*$this->beforeFilter('auth', array('except' => 'getLogin'));

        $this->beforeFilter('csrf', array('on' => 'post'));

        $this->afterFilter('log', array('only' => array('fooAction', 'barAction')));*/
        $this->middleware('auth');
    }

    public function showReport()
    {
        return view('report0');
    }

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

    public function getDrivers(){
        $resultArray = Driver::where('status', '=', 1)->get();

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
    }


    // RESTfull ################################################################
    //##########################################################################
}
