@foreach($tposts as $post)
    <br>
    {{$post->title}}
    <br>
    {{$post->content}}
    written by :
    <br>
    {{$post->user->name}}
    <br>
    <a href="{{route('posts.restore',['id'=>$post->id])}}">restore</a>    
    <br>
    <a href="{{route('posts.force',['id'=>$post->id])}}">force delete</a> 
@endforeach
<br>

<a href="{{url('/home')}}">home</a>
<a href="{{url('/')}}">welcome</a>