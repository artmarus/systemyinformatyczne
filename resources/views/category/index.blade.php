@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('categories.index') }}">Categories</a></li>
                    </ol>
                    <div class="panel-body">
                        <div class="list-group">
                            @foreach($categories as $category)
                                <a href="{{ route('categories.show', $category->id) }}" class="list-group-item">
                                    <span class="badge">{{ $category->getPhotoNum() }}</span>
                                    {{ $category->title }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection