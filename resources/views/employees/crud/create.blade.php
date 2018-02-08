@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Create Employee</h3>
                    </div>

                    <div class="panel-body">

                        <form class="form-horizontal" method="POST" action="{{ url("/employees") }}" enctype="multipart/form-data">
                            @include('employees.crud._form')
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection