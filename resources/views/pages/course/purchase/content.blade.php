<div id="scroll-mark" class="row my-5">
	<div class="col-lg-8 col-md-10 col-sm-12 col-12 mx-auto">

		@include('pages/course/purchase/course-card')

		@auth

		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-10 col-10 mx-auto">
		<div class="mb-5">
			<h4>Purchasing our courses</h4>
			<p class="lead">Courses have a lot of extra content in them and that's why they cost more. When you purchase a course, the cost is in addition to your subscription and appears in your payment history under Account Settings.</p>
			<p class="lead">Do you have any questions? Check out our <a href="" class="link-blue">F.A.Q.</a></p>
		</div>
			</div>
			<div class="col-lg-6 col-md-7 col-sm-12 col-12 p-4">
				
				@include('components/stripe/form', [
					'action' => route('user.purchase.course', $course->slug),
					'email' => auth()->user()->email,
                	'productType' => get_class($course),
                	'productId' => $course->id,
					'buttonLabel' => 'Purchase now!'
				])
		
			</div>
			<div class="col-lg-6 col-md-5 col-sm-12 col-12 p-4">
				<p class="text-muted border-bottom"><strong>We accept all major debit and credit cards</strong></p>
		
				@include('components/icons/credit-cards')
		
			</div>
		</div>

		@else

		<div class="my-5 d-flex align-items-center">
			<div class="mr-4">
				<i class="far fa-check-circle fa-2x text-success"></i>
			</div>
			<div>
				<p class="m-0"><strong>FREE 15 Day Trial to our membership</strong></p>
				<p class="m-0"><small>Included with your course purchase, you'll get unlimited access to all of classes, programs, and more, on all of your devices for 15 days. Enjoy! :)</small></p>
			</div>
		</div>
        
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-10 mx-auto">
                @component('pages/register/form', [
                	'formId' => 'payment-form',
                	'action' => route('register')
                ])
	                @slot('stripe')
	                <div class="mb-4">
		                @include('components/stripe/fields', [
		                	'email' => null,
		                	'productType' => get_class($course),
		                	'productId' => $course->id
		                ])
		            </div>
	                @endslot
	                @slot('submitButton')
			          <button class="btn-bold btn-block btn-red">Purchase now!</button>
	                @endslot
                @endcomponent
            </div>
            <div class="col-lg-5 col-md-5 col-sm-10 col-10 mx-auto">
			<p class="text-muted border-bottom"><strong>We accept all major debit and credit cards</strong></p>
			@include('components/icons/credit-cards')
            </div>
        </div>

		<p class="mt-4">
			Already a member? <span class="text-blue cursor-pointer" data-toggle="modal" data-target="#login"><strong>
				Login to purchase
			</strong></span>
		</p>
		@endauth
	</div>
</div>