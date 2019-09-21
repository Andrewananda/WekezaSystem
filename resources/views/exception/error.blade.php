@if(count($errors) >  0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger fade">{{ $error }}</div>
        @endforeach

    @endif
@if(Session::has('message'))
    <div class="alert alert-success fade">{{ Session::get('message') }}</div>
    @endif
