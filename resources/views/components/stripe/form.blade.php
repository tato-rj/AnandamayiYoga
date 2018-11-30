      <form action="{{$action ?? '/membership'}}" method="post" id="payment-form">
        {{csrf_field()}}

        @include('components/stripe/fields', ['email' => $email])
        
        <div class="mt-3">
          <button class="btn-bold btn-sm btn-block btn-red">
            <span class="label">{{$buttonLabel ?? __('Submit')}}</span>
          </button>
        </div>
      </form>