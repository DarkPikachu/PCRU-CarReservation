<?php namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Car;
use App\Driver;
use App\Task;
use Response;
use Request;

class TaskController extends Controller {

    public function __construct()
    {
        /*$this->beforeFilter('auth', array('except' => 'getLogin'));

        $this->beforeFilter('csrf', array('on' => 'post'));

        $this->afterFilter('log', array('only' => array('fooAction', 'barAction')));*/
    }

    public function postTaskDetail(){
        $taskId = Request::Input('taskId');
        $resultArray = Task::find($taskId);

        return Response::json(array(
            'error' => false,
            'datas' => $resultArray),
            200
        );
    }

    public function postAddTask(){
        try {//{ car: car, driver: driver, startDate: txtStartDate, endDate: txtEndDate, numDate: numDate, reserve_by: reserve_by, user: user, detail: detail };
            $task = new Task;

            $task->car          = Request::Input('car');
            $task->driver       = Request::Input('driver');
            $task->start_date   = Request::Input('startDate');
            $task->end_date     = Request::Input('endDate');
            $task->num_date     = Request::Input('numDate');
            $task->reserve_by   = Request::Input('reserve_by');
            $task->user         = Request::Input('user');
            $task->detail       = Request::Input('detail');
            $task->status       = 1;

            $task->save();

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

    public function postUpdateTask(){
        $taskId = Request::Input('taskId');
        //$resultArray = Task::find($taskId);

        $rules = array(
            'car'           => 'required|numeric',
            'driver'        => 'required|numeric',
            'startDate'     => 'required',
            'endDate'       => 'required',
            'numDate'       => 'required',
            'reserve_by'    => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            $messages   = $validator->messages();
            $errMsg     = '';
            foreach ($messages->all() as $message) {
                $errMsg .= $message."\n";
            }

            return Response::json(array(
                'error' => true,
                'msg' => $errMsg),
                200
            );

        } else {
            // store
            $task = Task::find($taskId);

            $task->car          = Request::Input('car');
            $task->driver       = Request::Input('driver');
            $task->start_date   = Request::Input('startDate');
            $task->end_date     = Request::Input('endDate');
            $task->num_date     = Request::Input('numDate');
            $task->reserve_by   = Request::Input('reserve_by');
            $task->user         = Request::Input('user');
            $task->detail       = Request::Input('detail');

            $task->save();
        }

        return Response::json(array(
            'error' => false,
            'datas' => 'complate'),
            200
        );
    }

    public function postDeleteTask(){
        $taskId = Request::Input('taskId');
        Task::destroy($taskId);

        return Response::json(array(
            'error' => false,
            'datas' => 'delete '.$taskId),
            200
        );
    }

    public function yearlyTask($date){
        $this->date = $date;

        $firstDay = Carbon::createFromFormat("Y-m-d", $date)->firstOfYear(); 
        $lastDay = Carbon::createFromFormat("Y-m-d", $date)->lastOfYear();
 
        $date = Carbon::createFromFormat("Y-m-d", $date);
        //$date->setTimezone('Asia/Bangkok');
        $tasks = Task::where(
            DB::raw('DATE_FORMAT(start_date,"%Y-%m-%d")'), '>=', DB::raw('DATE_FORMAT("'.$firstDay.'","%Y-%m-%d")')
        )->where(
            DB::raw('DATE_FORMAT(end_date,"%Y-%m-%d")'), '<=', DB::raw('DATE_FORMAT("'.$lastDay.'","%Y-%m-%d")')
        )
        //->with('car', 'driver', 'reserveBy', 'userInfo')
        /*->with([
            'car' => function($query){ $query->select('id', 'name','plate_number', 'province'); },
            'driver' => function($query){ $query->select('id', 'name','nickname', 'tel', 'unit'); },
            'reserveBy' => function($query){ $query->select('id', 'first_name','last_name', 'position', 'department'); },
            'userInfo' => function($query){ $query->select('id', 'first_name','last_name', 'position', 'department'); },
        ])->get();*/
        ->with(TaskController::getJsonOutputFormat())->get();
 
         return Response::json(array(
             'tasks' => $tasks, 
             'date' => $date,
             'first' => $firstDay,
             'last' => $lastDay),
             200);
     }

    public function monthlyTask($date){
       /* $this->date = $date;
        return Task::where('status', 1)->where(function($query) {
            $query->where(function($query) {
                return $query->where(DB::raw('YEAR( `start_date` )'), '=', DB::raw('YEAR( \''. $this->date .'\' )'))->where( DB::raw('MONTH( `start_date` )'), '=', DB::raw('MONTH( \''. $this->date .'\' )'));
            })->orWhere(function($query) {
                return $query->where(DB::raw('YEAR( `end_date` )'), '=', DB::raw('YEAR( \''. $this->date .'\' )'))->where(DB::raw('MONTH( `end_date` )'), '=', DB::raw('MONTH( \''. $this->date .'\' )'));
            });
        })->get();*/
        $firstDay = Carbon::createFromFormat("Y-m-d", $date)->firstOfMonth(); 
        $lastDay = Carbon::createFromFormat("Y-m-d", $date)->lastOfMonth(); 

        $this->date = $date;
        $date = Carbon::createFromFormat("Y-m-d", $date);
        //$date->setTimezone('Asia/Bangkok');
        $tasks = Task::where(
            DB::raw('DATE_FORMAT(start_date,"%Y-%m-%d")'), '>=', DB::raw('DATE_FORMAT("'.$firstDay.'","%Y-%m-%d")')
        )->where(
            DB::raw('DATE_FORMAT(end_date,"%Y-%m-%d")'), '<=', DB::raw('DATE_FORMAT("'.$lastDay.'","%Y-%m-%d")')
        )
        //->with('car', 'driver', 'reserveBy', 'userInfo')
        /*->with([
            'car' => function($query){ $query->select('id', 'name','plate_number', 'province'); },
            'driver' => function($query){ $query->select('id', 'name','nickname', 'tel', 'unit'); },
            'reserveBy' => function($query){ $query->select('id', 'first_name','last_name', 'position', 'department')
                ->with([
                    'position' => function($query){ $query->select('position_code', 'name'); },
                    'department' => function($query){ $query->select('department_code', 'name'); } 
                ]);
            },
            'userInfo' => function($query){ $query->select('id', 'first_name','last_name', 'position', 'department'); },
        ])->get();*/
        ->with(TaskController::getJsonOutputFormat())->get();

        return Response::json(array(
            'tasks' => $tasks, 
            'date' => $date,
            'first' => $firstDay,
            'last' => $lastDay),
            200);
    }

    public function dailyTask($date){
        $this->date = $date;

        $date = Carbon::createFromFormat("Y-m-d", $date);
        $tasks = Task::where(
            DB::raw('DATE_FORMAT(start_date,"%Y-%m-%d")'), '<=', DB::raw('DATE_FORMAT("'.$date.'","%Y-%m-%d")')
        )->where(
            DB::raw('DATE_FORMAT(end_date,"%Y-%m-%d")'), '>=', DB::raw('DATE_FORMAT("'.$date.'","%Y-%m-%d")')
        )
        //->with('car', 'driver', 'reserveBy', 'userInfo')
        /*->with([
            'car' => function($query){ $query->select('id', 'name','plate_number', 'province'); },
            'driver' => function($query){ $query->select('id', 'name','nickname', 'tel', 'unit'); },
            'reserveBy' => function($query){ $query->select('id', 'first_name','last_name', 'position', 'department'); },
            'userInfo' => function($query){ $query->select('id', 'first_name','last_name', 'position', 'department'); },
        ])*/
        ->with(TaskController::getJsonOutputFormat())->get();
        
        return Response::json(array(
            'tasks' => $tasks, 
            'date' => $date),
            200);
    }

    public function userTask($userID)
    {
        //$tasks = Task::where('driver', $userID);
        $tasks = Task::where('driver', $userID)->paginate(10);
        return $tasks;
    }

    public function getJsonOutputFormat(){
        return 
        [
            'car' => function($query){ $query->select('id', 'name','plate_number', 'province'); },
            'driver' => function($query){ $query->select('id', 'name','nickname', 'tel', 'unit'); },
            'reserveBy' => function($query){ $query->select('id', 'first_name','last_name', 'position', 'department')
                ->with([
                    'position' => function($query){ $query->select('position_code', 'name'); },
                    'department' => function($query){ $query->select('department_code', 'name'); } 
                ]);
            },
            'userInfo' => function($query){ $query->select('id', 'first_name','last_name', 'position', 'department')
                ->with([
                    'position' => function($query){ $query->select('position_code', 'name'); },
                    'department' => function($query){ $query->select('department_code', 'name'); } 
                ]);
            },
        ];
    }
}
