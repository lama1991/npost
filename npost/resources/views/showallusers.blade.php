@foreach($users as $user)
<h4>{{$user->name}} <br>
@foreach($user->roles as $role)
<br>
{{$role->name}}
<br>
@endforeach
<br>
<a href="{{ route('edit', ['id' => $user->id]) }}">edit</a>
@endforeach

<hr>

<a href="home">home</a>
<a href="{{url('/')}}">welcome</a>
