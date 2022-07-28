<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\Report;

class CasherController extends Controller
{
    function dashboard()
    {
        return view('casher.dashboard');
    }

    function generateReport()
    {
        $payrolls = Payroll::all();

        $numberOfAuthPayrolls = count($payrolls);
        $amount = 0;

        foreach ($payrolls as $p) $amount += $p->salary;


        return view('casher.generate_report')
            ->with('amount', $amount)
            ->with('number_of_authorized', $numberOfAuthPayrolls);
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
