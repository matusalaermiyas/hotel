<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\Payroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ManagerController extends Controller
{
    function dashboard()
    {
        return view('manager.dashboard');
    }

    function viewComments()
    {
        $comments = Comment::all();

        return view('manager.comments')->with('comments', $comments);
    }

    function permitLeave()
    {
        $leave_requests = Leave::all();

        return view('manager.permit_leave')->with('leave_requests', $leave_requests);
    }

    function permitLeaveApprove($id)
    {
        $leave_request = Leave::find($id);
        $leave_request->approved = true;
        $leave_request->save();

        Session::flash('success', 'Leave approved successfully');
        return redirect()->back();
    }

    function approveComment($id)
    {
        $comment = Comment::find($id);
        $comment->approved = true;
        $comment->save();

        Session::flash('success', 'Comment approved successfully');

        return redirect()->route('manager.view.comments');
    }

    function authorizePayRoll()
    {
        $employees = Employee::all();
        return view('manager.authorize_payroll')->with('employees', $employees);
    }

    // TODO

    function authorizeEmployeePayroll($id)
    {
        $employee = Employee::find($id);

        Payroll::create([
            'employee_id' => $employee->id,
            'salary' => $employee->salary,
            'authorize_date' => date('Y-m-d')
        ]);

        Session::flash('success', 'Employee payroll authorized successfully');

        return redirect()->back();
    }
}
