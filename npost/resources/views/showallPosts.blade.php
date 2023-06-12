@foreach($posts as $post)
    <br>
    {{$post->title}}
    <br>
    {{$post->content}}
    written by :
    <br>
    {{$post->user->name}}
    <form method="POST" action="{{ route('posts.soft.delete', ['id' => $post->id]) }}">
 
 {{ csrf_field() }}
 {{ method_field('DELETE') }}


     <input type="submit" value="move to trash">

</form>
    <hr>
@endforeach

<a href="trashed">trash</a>
<a href="{{url('/home')}}">home</a>
<a href="{{url('/')}}">welcome</a>