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
        return $this->getEmployees()->paginate(10);
    }

    public function create()
    {
        return view('employees.crud.create');
    }

    public function store()
    {

    }

    public function show(Employee $employee)
    {

    }

    public function edit(Employee $employee)
    {
        return view('employees.crud.edit', compact('employee'));
    }

    public function update(Employee $employee)
    {

    }

    public function destroy(Employee $employee)
    {
        return $employee->delete();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    protected function getEmployees()
    {
        $employees = Employee::search(
            request()->has('searchQuery') ? request('searchQuery') : ''
        );

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
