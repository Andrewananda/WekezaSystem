@extends('layouts.app')
@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Member</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form enctype="multipart/form-data" method="post" action="{{ route('update.member',['id'=>$user->id]) }}">
            @include('exception.error')
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="first_name">Name</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="name" placeholder="Name">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="id_number">ID</label>
                            <input type="text" name="id_number" value="{{ $user->id_number }}" class="form-control" id="id_number" placeholder="id number">
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="phone">phone</label>
                            <input type="phone" name="phone" value="{{ $user->phone }}" class="form-control" id="phone" placeholder="phone">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" value="{{ $user->username }}" class="form-control" id="username" placeholder="username">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <img src="{{ $user->photo }}" height="100px" alt="">
                            <input type="file" id="photo" name="photo">
                            <p class="help-block">Update member photo.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <button type="submit" style="margin-left:50%;margin-right:50%;display:block;margin-top:0%;margin-bottom:0%" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
