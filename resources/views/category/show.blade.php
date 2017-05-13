@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('categories.index') }}">Categories</a></li>
                        <li>{{ $category->title }}</li>
                    </ol>
                    <div class="panel-body">
                        @foreach($category->photos()->get() as $photo)
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="{{ route('photos.show', $photo->id) }}"><img src="{{ $photo->displayImage() }}" alt="Missing image"></a>
                                    <div class="caption">
                                        <p>{{ $photo->description }}</p>
                                        <p>
                                            @can('update', $photo)
                                                <a href="{{ route('photos.edit', $photo->id) }}" class="btn btn-primary btn-sm">
                                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit
                                                </a>
                                            @endcan

                                            @can('delete', $photo)
                                                <a href="{{ route('photos.delete', $photo->id) }}" class="btn btn-danger btn-sm">
                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Remove
                                                </a>
                                            @endcan
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="panel-footer">
                        @can('update', $category)
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit
                            </a>
                        @endcan

                        @can('delete', $category)
                            <a href="{{ route('categories.delete', $category->id) }}" class="btn btn-danger btn-sm">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Remove
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection