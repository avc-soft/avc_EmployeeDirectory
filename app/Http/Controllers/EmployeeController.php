<?php

namespace App\Http\Controllers;

use App\Employee;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->getEmployees();
    }

    protected function getEmployees()
    {
        return Employee::with('position')->paginate(10);
    }
}
