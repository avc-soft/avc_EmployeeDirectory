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

    /**
     * Employee deleted event
     */
    public function deleted()
    {
        flash('Employee deleted')->success();
    }

    /**
     * Employee saving event
     *
     * @param Employee $employee
     */
    public function saving(Employee $employee)
    {
        if (request()->hasFile('photo')) {
            $employee->photo = substr(request()->file('photo')->store('/public/image'),6);
        }
    }

    /**
     * Employee saved event
     */
    public function saved()
    {
        flash('Employee information saved')->success();
    }
}