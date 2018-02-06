<?php

namespace App\Http\Controllers;

use App\Employee;

class TreeController extends Controller
{
    /**
     * @return mixed
     */
    public function treeRoot()
    {
        // first() потому что у "Голландца" всегда должен быть капитан... (с) Пираты Карибского моря
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
