@if(isset($category->title))
    <input type="hidden" name="_method" value="PUT">
@endif

{{ csrf_field() }}

<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    <label for="title" class="col-md-4 control-label">Title</label>

    <div class="col-md-6">
        <input id="title" type="text" class="form-control" name="title"
               value="{{ old('title', (isset($category->title)) ? $category->title : null) }}" required autofocus>

        @if ($errors->has('title'))
            <span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
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