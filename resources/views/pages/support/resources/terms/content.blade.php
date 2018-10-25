@component('pages/support/resources/show', ['title' => 'Terms & Conditions'])

@slot('menu')
	@include('pages/support/resources/menu', ['terms' => 'font-weight-bold'])
@endslot

	<p class="lead">Pellentesque libero nunc, lacinia quis consequat eget, commodo ut enim. Nullam orci lacus, mollis quis justo vitae, sagittis commodo nisl. Morbi eu est mauris.</p>

	<p>Morbi ipsum nulla, fermentum vel massa id, rutrum luctus purus. Ut a nisi id ex porttitor accumsan. Quisque condimentum quis enim in volutpat. Nam tincidunt euismod massa nec dignissim. Donec eleifend quis ex venenatis interdum. Donec placerat ligula tincidunt bibendum hendrerit. Donec auctor venenatis urna vitae dignissim. Nulla facilisi.</p>

	<p>
		<ul class="list-style-circle">
			<li>Aliquam erat volutpat. Pellentesque ac iaculis lorem, eu mollis eros.</li>
			<li>Sed aliquam nunc sed eleifend venenatis.</li>
			<li>Praesent et eros sollicitudin, varius nisl nec, ultrices turpis.</li>
			<li>Cras iaculis sed purus ac sollicitudin.</li>
		</ul>
	</p>

	<p>Integer ac lobortis sapien. Proin ut lectus leo. Nulla nunc mauris, varius quis lobortis sed, maximus vitae augue. Praesent egestas sit amet turpis rhoncus luctus. Donec id nisl id lectus auctor aliquet sed eget sem. Praesent vitae porta nibh. Proin a imperdiet enim, nec euismod lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam accumsan turpis augue, et vulputate arcu blandit id. Ut iaculis odio facilisis, ultricies nulla et, gravida magna.</p>

	<p>Donec quis nunc lacus. Pellentesque libero nunc, lacinia quis consequat eget, commodo ut enim. Nullam orci lacus, mollis quis justo vitae, sagittis commodo nisl. Morbi eu est mauris. Fusce lobortis eros vitae aliquam mattis. Cras ut semper metus, ut congue neque. Proin at molestie lectus, sit amet iaculis arcu. Mauris sollicitudin accumsan nisi, et maximus arcu ultricies in.</p>

@endcomponent