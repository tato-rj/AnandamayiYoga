<a href="{{route('admin.email.create', ['email' => $email])}}" class="btn btn-{{$font ?? null}} btn-{{$color ?? 'blue'}} btn-{{$size ?? null}}">
	<i class="fas fa-envelope mr-2"></i>{{$label ?? 'Send an email'}}
</a>