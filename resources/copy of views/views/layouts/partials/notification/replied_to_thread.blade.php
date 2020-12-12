<a href="{{route('thread.show',$notification->data['thread']['id'])}}">
	{{$notification->data['user']['name']}} commented on your thread <strong>{{$notification->data['thread']['subject']}}</strong>
</a>