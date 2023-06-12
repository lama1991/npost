<form method="post" action="{{route('store')}}">
@csrf
title
<input type="text" name="title">
content
<input type="text" name="content">
<input type="submit">
</form>
