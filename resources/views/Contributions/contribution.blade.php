@extends('layouts.app')
@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add Member Contribution</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="post" action="{{ route('member.contribution') }}">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="first_name">Name</label>
                            <select name="user_id" id="user_id">
                                <option value="">Member name</option>
                                @foreach($users as $user)
                                <option name="user_id" value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="date">Date</label>
                                <input type="date"  name="date" id="date">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" name="amount"  id="amount" placeholder="Enter Amount">
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
