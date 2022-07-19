<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use Illuminate\Http\Request;

class CasherController extends Controller
{
    // - Generate Report
    // - View Authorized payroll
    function dashboard()
    {
        return view('casher.dashboard');
    }

    function generateReport()
    {
        return view('casher.generate_report');
    }

    function viewAuthorizedPayroll()
    {
        $authorizedPayrolls = Payroll::all();
        return view('casher.view_authorized_payroll')->with('payrolls', $authorizedPayrolls);
    }
}
