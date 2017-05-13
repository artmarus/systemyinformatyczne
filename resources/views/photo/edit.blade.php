@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('categories.index') }}">Categories</a></li>
                        <li><a href="{{ route('categories.show', $photo->category->id) }}">{{ $photo->category->title }}</a></li>
                        <li>Photos</li>
                        <li>{{ $photo->id }}</li>
                    </ol>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('photos.update', $photo->id) }}"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <input type="hidden" name="_method" value="PUT">

                            <div class="form-group">
                                <label for="preview" class="col-md-4 control-label">Preivew</label>
                                <div id="preview" class="col-md-6">
                                    <a href="{{ route('photos.show', $photo->id) }}" class="thumbnail">
                                        <img src="{{ $photo->displayImage() }}" alt="Missing image">
                                    </a>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <label for="category" class="col-md-4 control-label">Category</label>

                                <div class="col-md-6">
                                    <select class="selectpicker form-control" data-live-search="true" name="category" required autofocus>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ ($category->id == old('category', $photo->id_category)) ? 'selected' : '' }}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('category'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control" name="description" rows="4">{{ old('description', $photo->description) }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection