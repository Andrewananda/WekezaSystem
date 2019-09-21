@extends('layouts.app')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Projects</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                @if(Auth::user()->can('add-project'))
                                <th>Action</th>
                                    @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{$project->title}}</td>
                                    <td width="600px">{{ $project->description }}</td>
                                    @if(Auth::user()->can('add-project'))
                                    <td><a href="{{ route('edit.project',['id' => $project->id]) }}"><button class="btn btn-info">Edit</button></a></td>
                                        @endif
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                @if(Auth::user()->can('add-project'))
                                <th>Action</th>
                                    @endif
                            </tr>
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
