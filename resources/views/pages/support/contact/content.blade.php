<section id="scroll-mark" class="container py-4">
    @title(['title' => 'Get in touch'])
    <div class="row my-3">
        
        <div class="col-lg-6 col-md-8 col-sm-10 col-12 mx-auto mt-4">
            <article>
                <form method="POST" action="{{route('support.contact.send')}}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <input id="first_name" type="text" class="form-control bg-light {{ $errors->has('first_name') ? 'is-invalid' : 'border-0' }}" name="first_name" placeholder="@lang('First name')" value="{{ old('first_name') }}" required autofocus>

                        @if ($errors->has('first_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('first_name') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="last_name" type="text" class="form-control bg-light {{ $errors->has('last_name') ? 'is-invalid' : 'border-0' }}" name="last_name" placeholder="@lang('Last name')" value="{{ old('last_name') }}" required autofocus>

                        @if ($errors->has('last_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('last_name') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="email" type="email" class="form-control bg-light {{ $errors->has('email') ? 'is-invalid' : 'border-0' }}" name="email" placeholder="E-mail" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <select name="subject" required class="form-control bg-light {{ $errors->has('subject') ? 'is-invalid' : 'border-0' }}">
                            <option selected  disabled>I am contacting about...</option>
                            <option value="Question">Technical support</option>
                            <option value="Question">My account/billing</option>
                            <option value="Partnership">Partnership</option>
                            <option value="Question">Just asking a question</option>
                            <option value="Other">Something else</option>
                        </select>
                        @if ($errors->has('subject'))
                        <div class="invalid-feedback">
                            {{ $errors->first('subject') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <textarea class="form-control bg-light {{ $errors->has('message') ? 'is-invalid' : 'border-0' }}" placeholder="Write your message here" name="message" rows="5" required></textarea>
                        @if ($errors->has('message'))
                        <div class="invalid-feedback">
                            {{ $errors->first('message') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group mt-5">
                        <button type="submit" class="btn-bold btn-red btn-block">
                            Send my message
                        </button>
                    </div>
                    <div class="form-group text-muted text-center">
                        <small>You can also email us at <a href="#" class="link-default">contact@anandamayiyoga.com</a></small>
                    </div>
                </form>
            </article>
        </div>
    </div>
</section>
