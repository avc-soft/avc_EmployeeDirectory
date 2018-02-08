@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Employee Profile</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3" align="center">
                                <img alt="User Pic"
                                     src="{{ $employee->avatar }}"
                                     class="img-circle img-responsive">
                            </div>

                            <div class="col-md-9">
                                <h3>{{ $employee->name }}</h3>
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Position:</td>
                                        <td>{{ $employee->position->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Hire date:</td>
                                        <td>{{ $employee->hired_at }}</td>
                                    </tr>
                                    <tr>
                                        <td>Salary:</td>
                                        <td>USD {{ $employee->salary }}</td>
                                    </tr>
                                    <tr>
                                        <td>Boss:</td>
                                        <td>{{ $employee->boss_id? $employee->boss->name : '-' }}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-center">
                        <a href="{{ route('employees.edit', $employee) }}" class="btn btn-primary">Edit profile</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection