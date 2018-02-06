<?php

namespace App\Observers;

use App\Employee;

class EmployeeObserver
{
    /**
     * Listen to the Employee deleting event.
     *
     * @param  Employee  $employee
     * @return void
     */
    public function deleting(Employee $employee)
    {
        $employee->children()->get()->each(function ($item, $key) use ($employee) {
            $item->boss_id = $employee->boss_id;
            $item->save();
        });
    }
}