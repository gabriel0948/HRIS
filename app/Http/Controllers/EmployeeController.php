<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{


    public function index(Request $request)
    {
        if (!empty($_GET['search_txt'])) {
            $query = DB::table('plantilla')
                ->join('officesNP', 'plantilla.OFFCODE', '=', 'officesNP.offcode')
                ->select('plantilla.IDNO', 'plantilla.FINAME', 'plantilla.MIDNAME', 'plantilla.SURNAME', 'officesNP.offdesc', 'plantilla.unique')
                ->where('IDNO', 'LIKE', "%{$request->search_txt}%")
                ->get();
            return view('admin.apply-leave', ['employee' =>  $query]);
        } else {
            return view('admin.apply-leave');
        }
    }

    public function calendarLeave(Request $request)
    {



        // if (!empty($_GET['emp_id'])) {

        // error_log("test");
        // $emp_id = 29805;


        $emp_id = $request->emp_id;
        // $emp_id = 29805;
        $data = Attendance::Select('leave_date as start')->where('employee_id', $emp_id)->get();
        return view('admin.calendar-leave', array('data' => $data));
        // return response()->json($data);
        // return view('admin.calendar-leave', ['collection' => json_encode($data)]);
        // } else {
        // }



        // $id = $request->input('id');
        // if ($request->ajax()) {



        // $data = DB::table('attendance')
        // ->select('leave_date as start')
        // ->where('employee_id', $emp_id)
        // ->get();
        // if ($request->ajax()) {

        // $emp_id = 29805;
        // $emp_id = $request->emp_id;
        // $data = Attendance::Select('leave_date as start')->where('employee_id', $emp_id)->get();

        // return response()->json($data);
        // }
        // return view('admin.apply-leave');

        // }


        // $data = Attendance::all();

        // // return view('admin.apply-leave', compact('data'));

        // }
        // return view('admin.apply-leave');
    }



    public function store(Request $request)
    {
        // $request->validate(
        //     [
        //         'leave_date' => 'required'
        //     ],
        //     [
        //         'leave_date.required' => 'leave Date is Required Please select a date in the calendar'
        //     ]
        // );

        Attendance::create([
            'employee_id' => $request->input('employee_id'),
            'leave_date' => $request->input('leave_date'),
            'am1' => $request->input('am1'),
            'am1_code' => $request->input('am1_code'),
            'am2' => $request->input('am2'),
            'am2_code' => $request->input('am2_code'),
            'pm1' => $request->input('pm1'),
            'pm1_code' => $request->input('pm1_code'),
            'pm2' => $request->input('pm2'),
            'pm2_code' => $request->input('pm2_code'),
            'undertime' => 0,
            'remarks' => $request->input('remarks'),
        ]);
        return redirect()->back()->with(['success' => 'You have Successfully added a leave']);
        // return redirect()->route('search_emp')->with(['success' => 'You have Successfully Created']);
    }
}
