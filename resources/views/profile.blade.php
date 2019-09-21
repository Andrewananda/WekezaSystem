@extends('layouts.app')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">{{ $user->name }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <tbody>
                            <td>
                                <img src="{{ $user->photo }}" height="100px" alt="img"> <br>
                                Phone: <b>{{ $user->phone }} </b> <br>
                                Username: <b> {{ $user->username }} </b>
                            </td>
                            <td></td>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

@endsection
