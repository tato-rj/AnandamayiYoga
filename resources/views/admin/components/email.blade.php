<a href="{{route('admin.email.create', ['email' => $email])}}" class="btn btn-{{$font or null}} btn-{{$color or 'blue'}} btn-{{$size or null}}">
	<i class="fas fa-envelope mr-2"></i>{{$label or 'Send an email'}}
</a>