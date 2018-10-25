<div class="d-flex justify-content-center align-items-center">
	<i class="fa-star 
		{{$score >= 1 ? 'fas' : 'far'}} 
		{{$score >= 1 ? 'text-warning': 'text-muted'}} 
		{{$score >= 1 ? null : 'opacity-4'}} 
		mr-{{$margin or '2'}} fa-{{$size or 'lg'}} cursor-pointer"></i>
	<i class="fa-star 
		{{$score >= 2 ? 'fas' : 'far'}} 
		{{$score >= 2 ? 'text-warning': 'text-muted'}} 
		{{$score >= 2 ? null : 'opacity-4'}} 
		mr-{{$margin or '2'}} fa-{{$size or 'lg'}} cursor-pointer"></i>
	<i class="fa-star 
		{{$score >= 3 ? 'fas' : 'far'}} 
		{{$score >= 3 ? 'text-warning': 'text-muted'}} 
		{{$score >= 3 ? null : 'opacity-4'}} 
		mr-{{$margin or '2'}} fa-{{$size or 'lg'}} cursor-pointer"></i>
	<i class="fa-star 
		{{$score >= 4 ? 'fas' : 'far'}} 
		{{$score >= 4 ? 'text-warning': 'text-muted'}} 
		{{$score >= 4 ? null : 'opacity-4'}} 
		mr-{{$margin or '2'}} fa-{{$size or 'lg'}} cursor-pointer"></i>
	<i class="fa-star 
		{{$score >= 5 ? 'fas' : 'far'}} 
		{{$score >= 5 ? 'text-warning': 'text-muted'}} 
		{{$score >= 5 ? null : 'opacity-4'}} 
		mr-{{$margin or '2'}} fa-{{$size or 'lg'}} cursor-pointer"></i>
</div>