@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('categories.index') }}">Categories</a></li>
                        <li><a href="{{ route('categories.show', $photo->id_category) }}">{{ $photo->category->title }}</a></li>
                        <li>{{ $photo->category->title }}</li>
                    </ol>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="thumbnail">
                                <a href="{{ route('photos.show', $photo->id) }}"><img src="{{ $photo->displayImage() }}" alt="Missing image"></a>
                                <div class="caption">
                                    <p>{{ $photo->description }}</p>
                                    <p><rated :rated="{{ $photo->getRating() }}"></rated></p>
                                    <p>
                                        <rating :photo="{{ $photo->id }}"></rating>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection