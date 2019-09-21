@extends('layouts.app')
@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add Member</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        <form enctype="multipart/form-data" method="post" action="{{ route('register.member') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="first_name">First name</label>
                            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First name">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="last_name">Last name</label>
                            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last name">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="id_number">ID</label>
                            <input type="text" name="id_number" class="form-control" id="id_number" placeholder="id number">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="password">password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="password">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="phone">phone</label>
                            <input type="phone" name="phone" class="form-control" id="phone" placeholder="phone">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="username">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" id="photo" name="photo">
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
    @include('exception.error')
@endsection
