<div class="col-lg-5 col-md-6 col-10 mx-auto my-5">

<div class="text-center border px-3 py-4">
	<h5 class="text-red">Os vídeos estarão disponíveis em breve!</h5>
	<p>Gostaria de receber uma mensagem quando este conteúdo estiver pronto?</p>
	<form method="POST" action="{{route('notify')}}">
		@csrf
		<div class="form-group">
			<input type="email" name="notify_email" required placeholder="Email" class="form-control">
		</div>
		<button class="btn btn-red btn-block">Sim, me avise quando estiver pronto!</button>
	</form>
</div>

</div>