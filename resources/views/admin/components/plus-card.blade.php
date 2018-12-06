@manager
<div class="rounded cursor-pointer position-relative p-0 t-2 h-100" 
  data-toggle="modal" data-target="#add-modal" style="border: dashed 10px lightgrey; min-height: 271.6px">
  <i class="fas fa-plus fa-4x absolute-center" style="color: lightgrey"></i>
</div>
@else
<a href="
	mailto:contact@anandamayiyoga.com?
	subject=New {{$item ?? null}} request from {{auth()->user()->fullName}}&
	body=Send us as much info as you can about your new {{$item ?? null}} here and we'll be in touch!" 
	class="link-none">
	<div class="rounded cursor-pointer position-relative p-0 t-2 h-100 d-flex align-items-center justify-content-center" style="border: dashed 10px lightgrey; min-height: 271.6px">
	  <h5 style="color: lightgrey"><strong>NEW REQUEST</strong></h5>
	</div>
</a>
@endmanager