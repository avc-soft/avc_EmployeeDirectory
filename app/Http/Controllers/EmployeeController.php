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
        $this->middleware('auth')->except(['treeRoot', 'treeChildren']);
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index()
    {
        return $this->getEmployees()->paginate(10);
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

    /**
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    protected function getEmployees()
    {
        $searchQuery = request()->has('searchQuery') ? request('searchQuery') : '';
        $employees = Employee::search($searchQuery);

        if ($field = request('sortBy')) {
            if (strpos($field, '-') === 0) {
                $direction = 'desc';
                $field = substr($field, 1);
            } else {
                $direction = 'asc';
            }
            $employees->orderBy($field, $direction);
        }

        return $employees;
    }
}
