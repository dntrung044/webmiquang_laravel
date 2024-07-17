@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif

@if (session('confirmation'))
    <div class="alert alert-info" role="alert">
        {!! session('confirmation') !!}
    </div>
@endif

@if ($errors->has('confirmation') > 0)
    <div class="alert alert-danger" role="alert">
        {!! $errors->first('confirmation') !!}
    </div>
@endif

@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('message'))
    <div class="alert alert-message">
        {{ Session::get('message') }}
    </div>
@endif
