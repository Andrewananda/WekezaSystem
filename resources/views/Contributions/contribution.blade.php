@extends('layouts.app')
@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Add Member Contribution</h3>
    </div>
    @include('exception.error')
    <form enctype="multipart/form-data" method="post" action="{{ route('member.contribution') }}">
        @csrf
        <div class="row">

            <div class="col-md-6">
                <div class="box-body">
                    <div class="form-group">
                        <label>User</label>
                        <select class="form-control select2" name="user_id" id="user_id" style="width: 100%;">
                            <option selected="selected">Member Name</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box-body">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="date" class="form-control" id="date" placeholder="Date">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box-body">
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" name="amount" class="form-control"  id="amount" placeholder="Enter Amount">
                    </div>
                </div>
            </div>

        </div>
        <div class="box-body">
            <button type="submit" style="display:block;margin: 0% 35%; width: 300px" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection
