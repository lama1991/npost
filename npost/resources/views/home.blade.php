@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <br>
                @if(in_array('admin',$r))
                <!-- this route also has a middleware -->
                <a href="all_users"><h3>manage users<h3></a>
                @endif
               
                <br>
                <a href="posts" ><h3>all posts<h3></a>   
                 <br>
                 <a href="posts/create" ><h3>create post<h3></a>
                <br>
                <a href="posts/my_posts" ><h3>my posts<h3></a>
                 <br>

            </div>
        </div>
    </div>
</div>

@endsection

