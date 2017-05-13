@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Best rated photos
                </div>
                <div class="panel-body">
                    @foreach($photos as $photo)
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <a href="{{ route('photos.show', $photo->id) }}"><img src="{{ $photo->displayImage() }}" alt="Missing image"></a>
                                <div class="caption">
                                    <p>{{ $photo->description }}</p>
                                    <p><rated :rated="{{ $photo->getRating() }}"></rated></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="panel-footer"></div>
            </div>
        </div>
    </div>
</div>
@endsection
