<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Requests\SaveEmployee;

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
        $employees = $this->getEmployees();

        return $this->withoutPagination() ? $employees->get() : $employees->paginate(10);
    }

    public function create()
    {
        return view('employees.crud.create');
    }

    public function store(SaveEmployee $request)
    {
        $employee = Employee::create($request->all());

        return redirect()->action('EmployeeController@show', $employee);
    }

    public function show(Employee $employee)
    {
        return view('employees.crud.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.crud.edit', compact('employee'));
    }

    public function update(SaveEmployee $request, Employee $employee)
    {
        $employee->update($request->all());

        return redirect()->action('EmployeeController@show', $employee);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
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

    /**
     * Indicates if pagination is needed or we want just all at once
     *
     * @return bool
     */
    protected function withoutPagination()
    {
        return request()->has('getAll');
    }
}
