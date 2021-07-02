@extends('layouts.app')
@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add Minutes</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        <form enctype="multipart/form-data" method="post" action="{{ route('add.minutes') }}">
            @csrf
            @include('exception.error')
            <div class="row">
                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Date</label>
                            <input type="date" name="date" class="form-control" id="date" placeholder="date">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="minutes">Add Minutes</label>
                            <input type="file" name="minutes"  id="minutes" placeholder="date">
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
