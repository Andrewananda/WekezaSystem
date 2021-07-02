@extends('layouts.app')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Wekeza Cousins</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Phone</th>
                                <th>Photo</th>
                                @if(Auth::user()->can('edit-member'))
                                <th>Action</th>
                                    @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    <img src="{{ $user->photo }}" height="100px" alt="">
                                </td>
                                @if(Auth::user()->can('edit-member'))
                                <td><a href="{{ route('edit.member',['id' => $user->id]) }}"><button class="btn btn-info">Edit</button></a></td>
                                    @endif
                            </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Phone</th>
                                <th>Photo</th>
                                @if(Auth::user()->can('edit-member'))
                                <th>Action</th>
                                    @endif
                            </tr>
                            </tfoot>
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
