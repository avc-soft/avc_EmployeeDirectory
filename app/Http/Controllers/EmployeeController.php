<?php

namespace App\Http\Controllers;

use App\Employee;

class EmployeeController extends Controller
{

    /**
     * EmployeeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index()
    {
        return Employee::paginate(10);
    }

    /**
     * @return mixed
     */
    public function treeRoot()
    {
        return Employee::whereBossId(0)->first();
    }

    /**
     * @param Employee $employee
     *
     * @return mixed
     */
    public function treeChildren(Employee $employee)
    {
        return $employee->children()->get();
    }
}
