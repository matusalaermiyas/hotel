<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Employee;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class SystemAdminController extends Controller
{
    function dashboard()
    {
        return view('system_admin.dashboard');
    }

    function viewRooms()
    {
        $rooms = Room::all();
        return view('system_admin.view_rooms')->with('rooms', $rooms);
    }

    function addRoom()
    {
        return view('system_admin.add_room');
    }

    function deleteRoom()
    {
        $rooms = Room::all();
        return view('system_admin.delete_room')->with('rooms', $rooms);
    }

    function updateRoom()
    {
        $rooms = Room::all();
        return view('system_admin.update_room')->with('rooms', $rooms);
    }

    function addEmployee()
    {
        return view('system_admin.add_employee');
    }

    function terminateEmployee()
    {
        $employees = Employee::all();

        return view('system_admin.delete_employee')->with('employees', $employees);
    }

    function updateEmployee()
    {
        $employees = Employee::all();

        return view('system_admin.update_employee')->with('employees', $employees);
    }



    function viewEmployees()
    {
        $employees = Employee::all();

        return view('system_admin.view_employees')->with('employees', $employees);
    }

    function addEmployeePost(Request $request)
    {
        $file_name = Str::random(10) . $request->file('profile')->getClientOriginalName();
        $destination = public_path() . '/images/employee_profiles';
        $request->file('profile')->move($destination, $file_name);

        $path = '/images/employee_profiles/' . $file_name;


        Employee::create([
            'first_name' => $request['first_name'],
            'middle_name' => $request['middle_name'],
            'last_name' => $request['last_name'],
            'salary' => $request['salary'],
            'office_telephone' => $request['office_telephone'],
            'mobile_phone' => $request['mobile_phone'],
            'job_title' => $request['job_title'],
            'dob' => $request['dob'],
            'profile' => $path,
            'gender' => $request['gender']
        ]);


        Session::flash('success', 'Employee Added Successfully');

        return redirect()->back();
    }

    function deleteEmployee($id)
    {
        $employee = Employee::find($id);
        $account = Account::where('employee_id', $employee->id)->first();

        if ($employee) {
            $employee->delete();
            $account->delete();
        }

        Session::flash('success', 'Employee Deleted Successfully');

        return redirect()->back();
    }

    // Show update form
    function updateEmployeeCreate($id)
    {
        $employee = Employee::find($id);
        return view('system_admin.update_employee_form')->with('employee', $employee);
    }

    function updateEmployeeStore(Request $request, $id)
    {
        $employee = Employee::find($id);

        if (!$employee) return redirect()->route('system_admin.dashboard');

        $path = $request['profile_picture'];


        if ($request->file('profile')) {
            $file_name = Str::random(10) . $request->file('profile')->getClientOriginalName();
            $destination = public_path() . '/images/employee_profiles';
            $request->file('profile')->move($destination, $file_name);

            $path = '/images/employee_profiles/' . $file_name;
        }


        $employee->update([
            'first_name' => $request['first_name'],
            'middle_name' => $request['middle_name'],
            'last_name' => $request['last_name'],
            'salary' => $request['salary'],
            'office_telephone' => $request['office_telephone'],
            'mobile_phone' => $request['mobile_phone'],
            'job_title' => $request['job_title'],
            'dob' => $request['dob'],
            'profile' => $path
        ]);


        Session::flash('success', 'Employee Updated Successfully');

        return redirect()->route('system_admin.view.employees');
    }

    function addRoomPost(Request $request)
    {
        $file_name = Str::random(10) . $request->file('room_picture')->getClientOriginalName();
        $destination = public_path() . '/images/room_pictures';
        $request->file('room_picture')->move($destination, $file_name);

        $path = '/images/room_pictures/' . $file_name;


        Room::create([
            'price' => $request['price'],
            'floor_no' => $request['floor_no'],
            'max_guest' => $request['max_guest'],
            'details' => $request['details'],
            'discount' => $request['discount'],
            'room_type' => $request['room_type'],
            'room_picture' => $path,
            'available_rooms' => $request['available_rooms']
        ]);

        Session::flash('success', 'Room Added Successfully');

        return redirect()->route('rooms');
    }

    function deleteRoomPost($id)
    {
        $room = Room::find($id);

        if ($room) $room->delete();

        Session::flash('success', 'Room Deleted Successflly');

        return redirect()->back();
    }

    function updateRoomCreate($id)
    {
        $room = Room::find($id);
        return view('system_admin.update_room_form')->with('room', $room);
    }

    function updateRoomStore(Request $request, $id)
    {
        $room = Room::find($id);
        $path = $request['room_picture_'];


        if ($request->file('room_picture')) {
            $file_name = Str::random(10) . $request->file('room_picture')->getClientOriginalName();
            $destination = public_path() . '/images/room_pictures';
            $request->file('room_picture')->move($destination, $file_name);

            $path = '/images/room_pictures/' . $file_name;
        }

        $room->update([
            'price' => $request['price'],
            'floor_no' => $request['floor_no'],
            'max_guest' => $request['max_guest'],
            'details' => $request['details'],
            'discount' => $request['discount'],
            'room_type' => $request['room_type'],
            'room_picture' => $path,
            'available_rooms' => $request['available_rooms']
        ]);

        Session::flash('success', 'Room Updated Successfully');
        return redirect()->route('sa.view.rooms');
    }

    function showCreateAccount()
    {
        $employees = Employee::all();

        return view('system_admin.create_account')->with('employees', $employees);
    }

    function storeCreateAccount(Request $request)
    {
        $account = Account::where('username', $request['username'])->first();
        $employee = Employee::find($request['employee']);

        if ($account) {
            Session::flash('error', 'Username Already Taken Try Another.');
            return redirect()->back();
        }

        $account = Account::where('employee_id', $employee->id)->first();

        if ($account) {
            Session::flash('error', 'Account already created for this employee');
            return redirect()->back();
        }

        Account::create([
            'employee_id' => $employee->id,
            'username' => $request['username'],
            'password' => $request['password'],
            'role' => $employee->job_title
        ]);

        Session::flash('success', 'Account Created Successfully');
        return redirect()->back();
    }
}
