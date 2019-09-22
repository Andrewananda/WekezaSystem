@extends('layouts.app')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Minutes</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Minute</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($minutes as $minute)
                                <tr>
                                    <td>{{$minute->title}}</td>
                                    <td>{{ $minute->date }}</td>

                                    <td>
                                        <a target="_blank" href="{{ $minute->minute }}">
                                        <button class="btn btn-info">View Minutes</button>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Minute</th>
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
