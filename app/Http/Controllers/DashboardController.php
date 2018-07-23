<?php namespace App\Http\Controllers;

use App\SysConfig;
use App\Car, App\Driver, App\Task;
use Response, Request, Input;
use DB;

class DashboardController extends Controller {

    public function __construct()
    {
        /*$this->beforeFilter('auth', array('except' => 'getLogin'));

        $this->beforeFilter('csrf', array('on' => 'post'));

        $this->afterFilter('log', array('only' => array('fooAction', 'barAction')));*/
        $this->middleware('auth');
    }

    public function showCalendar()
    {
        return view('dashboard0');
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
        /*$resultArray    = DB::select("SELECT task.car, sum(1) as \"count\", "
                . "SUM(DATEDIFF(IF(end_date > LAST_DAY('?'), LAST_DAY(start_date), end_date), IF(start_date < DATE_FORMAT('?','%Y-%m-01'), DATE_FORMAT('?','%Y-%m-01'), start_date))+1) as total "
                . "FROM `task` WHERE status=1 AND ((YEAR( `start_date` ) = YEAR( '?' ) AND MONTH( `start_date` ) = MONTH( '?' )) or (YEAR( `end_date` ) = YEAR( '?' ) AND MONTH( `end_date` ) = MONTH( '?' ))) group by task.car", array($date,$date,$date,$date,$date,$date,$date));*/
        $resultArray    = DB::select("SELECT task.car, sum(1) as \"count\", "
                . "SUM(DATEDIFF(IF(end_date > LAST_DAY('$date'), LAST_DAY(start_date), end_date), IF(start_date < DATE_FORMAT('$date','%Y-%m-01'), DATE_FORMAT('$date','%Y-%m-01'), start_date))+1) as total "
                . "FROM `task` WHERE status=1 AND ((YEAR( `start_date` ) = YEAR( '$date' ) AND MONTH( `start_date` ) = MONTH( '$date' )) or (YEAR( `end_date` ) = YEAR( '$date' ) AND MONTH( `end_date` ) = MONTH( '$date' ))) group by task.car");

        return $resultArray;
    }

    function countDrivers($date)
    {
        /*$resultArray    = DB::select("SELECT task.driver, count(1) as \"count\", "
                . "SUM(DATEDIFF(IF(end_date > LAST_DAY('?'), LAST_DAY(start_date), end_date), IF(start_date < DATE_FORMAT('?','%Y-%m-01'), DATE_FORMAT('?','%Y-%m-01'), start_date))+1) as total "
                . "FROM `task` WHERE status=1 AND ((YEAR( `start_date` ) = YEAR( '?' ) AND MONTH( `start_date` ) = MONTH( '?' )) or (YEAR( `end_date` ) = YEAR( '?' ) AND MONTH( `end_date` ) = MONTH( '?' ))) group by task.driver", array($date,$date,$date,$date,$date,$date,$date));*/

        $resultArray    = DB::select("SELECT task.driver, count(1) as \"count\", "
                . "SUM(DATEDIFF(IF(end_date > LAST_DAY('$date'), LAST_DAY(start_date), end_date), IF(start_date < DATE_FORMAT('$date','%Y-%m-01'), DATE_FORMAT('$date','%Y-%m-01'), start_date))+1) as total "
                . "FROM `task` WHERE status=1 AND ((YEAR( `start_date` ) = YEAR( '$date' ) AND MONTH( `start_date` ) = MONTH( '$date' )) or (YEAR( `end_date` ) = YEAR( '$date' ) AND MONTH( `end_date` ) = MONTH( '$date' ))) group by task.driver");

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


    // API
    public function index()
    {
        $date = Request::header('date');
        /*$resultArray = array(
                'cars' => Car::where('status', '=', 1)->get(),
                'drivers' => allDrivers(),
                'monthlyTask' => monthlyTask($date),
                'countCars' => countCars($date),
                'countDrivers' => countDrivers($date));*/
        $resultArray = array(
            'cars'          => Car::where('status', 1)->get(),
            'drivers'       => Driver::where('status', 1)->get(),
            'monthlyTask'   => $this->monthlyTask($date),
            'countCars'     => $this->countCars($date),
            'countDrivers'  => $this->countDrivers($date));

        //$resultArray = array();

        //return Response::eloquent($todo)
        return Response::json(array(
            'error' => false,
            'datas' => $resultArray),
            200
        );
    }

    public function show($date)
    {
        //$date = Request::input('dashboard');

        $resultArray = array(
            'cars'          => Car::where('status', 1)->get(),
            'drivers'       => Driver::where('status', 1)->get(),
            'monthlyTask'   => $this->monthlyTask($date),
            'countCars'     => $this->countCars($date),
            'countDrivers'  => $this->countDrivers($date)
        );

        //$resultArray = array();

        //return Response::eloquent($todo)
        return Response::json(array(
            'error' => false,
            'datas' => $resultArray),
            200
        );
    }

    public function store()
    {
        /*$s = $this->user->create(Input::all());

        if($s->isSaved())
        {
            return Redirect::route('users.index')
              ->with('flash', 'The new user has been created');
        }

        return Redirect::route('register')
            ->withInput()
            ->withErrors($s->errors());*/

        /*
        return Training::create([
            "name"        => Request::Input("name"),
            "description" => Request::Input("description"),
            "started_at"  => Request::Input("started_at"),
            "ended_at"    => Request::Input("ended_at")
        ]);*/

       /* $training               = new Training();
        $training->doc_no       = Request::Input("doc_no");
        $training->doc_date     = Request::Input("doc_date");
        $training->topic        = Request::Input("topic");
        $training->detail       = Request::Input("detail");
        $training->location     = Request::Input("location");
        $training->district     = Request::Input("district");
        $training->province     = Request::Input("province");
        $training->lastdate_reg = Request::Input("lastdate_reg");
        $training->ref          = Request::Input("ref");
        $training->date_start   = Request::Input("date_start");
        $training->date_end     = Request::Input("date_end");
        $training->user_add     = Auth::user()->id;
        $training->status       = 1;
        $training->save();

        //return Response::eloquent($todo)
        return Response::json(array(
            'error' => false,
            'datas' => $training->toArray()),
            200
        );*/
    }
    //##########################################################################

    public function monthlyTask($date){
        $this->date = $date;
        return Task::where('status', 1)->where(function($query) {
            $query->where(function($query) {
                return $query->where(DB::raw('YEAR( `start_date` )'), '=', DB::raw('YEAR( \''. $this->date .'\' )'))->where( DB::raw('MONTH( `start_date` )'), '=', DB::raw('MONTH( \''. $this->date .'\' )'));
            })->orWhere(function($query) {
                return $query->where(DB::raw('YEAR( `end_date` )'), '=', DB::raw('YEAR( \''. $this->date .'\' )'))->where(DB::raw('MONTH( `end_date` )'), '=', DB::raw('MONTH( \''. $this->date .'\' )'));
            });
        })->get();
    }
}
