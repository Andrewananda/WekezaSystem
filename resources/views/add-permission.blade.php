@extends('layouts.app')
@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add Permission</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        @include('exception.error')
        <form method="post" action="{{ route('register.permissions') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Permission name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Permission name">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Description</label>
                            <textarea name="description" class="form-control" id="description" placeholder="Description"></textarea>
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
