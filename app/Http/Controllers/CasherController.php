<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\Report;

class CasherController extends Controller
{
    // - Generate Report
    // - View Authorized payroll

    private $counter = 1;



    function dashboard()
    {
        return view('casher.dashboard');
    }

    function generateReport()
    {
        $reports = Report::where('role', session()->get('role'))->get();

        return view('casher.generate_report')->with('reports', $reports);
    }

    function viewAuthorizedPayroll()
    {
        Report::create([
            'role' => session()->get('role'),
            'description' => 'View Authorized Payroll',
            'employee_id' => session()->get('employee_id')
        ]);

        $authorizedPayrolls = Payroll::all();
        return view('casher.view_authorized_payroll')->with('payrolls', $authorizedPayrolls);
    }
}
