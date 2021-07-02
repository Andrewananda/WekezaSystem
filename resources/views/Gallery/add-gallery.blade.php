@extends('layouts.app')
@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add Gallery</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        <form enctype="multipart/form-data" method="post" action="{{ route('add.gallery') }}">
            @include('exception.error')
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <div id="imagePreview">
                                <img src="http://placehold.it/180" height="100px" id="blah" alt="">
                            </div>
                            <input onchange="readURL(this);" value="1" type="file" id="imageUpload" name="photo[]">
                            <p class="help-block">Upload member photo.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <div id="imagePreview">
                                <img src="http://placehold.it/180" height="100px" id="blah" alt="">
                            </div>
                            <input onchange="readURL(this);" value="2" type="file" id="imageUpload" name="photo[]">
                            <p class="help-block">Upload member photo.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <div id="imagePreview">
                                <img src="http://placehold.it/180" height="100px" id="blah" alt="">
                            </div>
                            <input onchange="readURL(this);" value="3" type="file" id="imageUpload" name="photo[]">
                            <p class="help-block">Upload member photo.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <div id="imagePreview">
                                <img src="http://placehold.it/180" height="100px" id="blah" alt="">
                            </div>
                            <input onchange="readURL(this);" value="4" type="file" id="imageUpload" name="photo[]">
                            <p class="help-block">Upload member photo.</p>
                        </div>
                    </div>
                </div>


            </div>
            <div class="box-body">
                <button type="submit" style="margin-left:50%;margin-right:50%;display:block;margin-top:0%;margin-bottom:0%" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

@endsection
