@extends('layouts.app')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">All Photos</h3>
        </div>

        <div class="row">
            @foreach($photos as $photo)
                <div class="col-md-3">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <div id="imagePreview">
                                <img src="{{ $photo->photo }}" height="100px" id="blah" alt="">
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
