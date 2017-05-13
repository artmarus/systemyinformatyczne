@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('categories.index') }}">Categories</a></li>
                        <li>Photos</li>
                        <li>Add</li>
                    </ol>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('photos.store') }}"
                              enctype="multipart/form-data" novalidate>
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <label for="category" class="col-md-4 control-label">Category</label>

                                <div class="col-md-6">
                                    <select class="selectpicker form-control" data-live-search="true" name="category" required autofocus>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ (old('category') == $category->id) ? 'selected' : '' }}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('category'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                                <label for="photo-group" class="col-md-4 control-label">Photo</label>

                                <div class="col-md-6">
                                    <div id="photo-group" class="input-group">
                                        <label class="input-group-btn">
                                        <span class="btn btn-primary">
                                            Browse&hellip; <input id="photo" type="file" name="photo" value="{{ old('photo') }}" style="display: none;" required>
                                        </span>
                                        </label>
                                        <input type="text" class="form-control" readonly>
                                    </div>

                                    @if ($errors->has('photo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('photo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control" name="description" rows="4">{{ old('description') }}</textarea>

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