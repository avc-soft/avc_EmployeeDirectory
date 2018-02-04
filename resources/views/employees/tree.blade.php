@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Employees Tree</h3>
                    </div>

                    <div class="panel-body">
                        <tree />
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
