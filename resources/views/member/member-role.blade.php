@extends('layouts.app')
@section('content')

    <form action="{{ route('assign.permission', ['id'=>$user->id]) }}" method="post">
        @csrf
        <div id="page-content">
            <div class="row form-group">
                <div class="col-md-6">
                    <div class="block-title">
                        <h2>{{ $user->name }}</h2>
                    </div>
                </div>
            </div>

            <div class="block full">

                <p> All User Permissions</p>
                <div class="table-responsive">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="row form-group">
                                @for($i=0;$i<sizeof($permissions);$i++)
                                    <div class="col-md-3 permit">
                                        @if(in_array($permissions[$i]->id, $perms))
                                            <input tabindex="1" type="checkbox" id="permission{{$i}}"  name="permissions[]" value="{{ $permissions[$i]->id }}" checked>
                                        @else
                                            <input tabindex="1" type="checkbox" id="permission{{$i}}"  name="permissions[]" value="{{ $permissions[$i]->id }}">
                                        @endif
                                        <label for="permission{{$i}}"><span>{{ ucwords(str_replace('-',' ',$permissions[$i]->name)) }}</span></label>
                                    </div>
                                @endfor
                            </div>

                        </div>
                        <!-- END Datatables Content -->
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>




@endsection
