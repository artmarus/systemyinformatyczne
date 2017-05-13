@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('categories.index') }}">Categories</a></li>
                        <li>Add</li>
                    </ol>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('categories.store') }}">
                            @include('category._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection