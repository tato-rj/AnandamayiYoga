<section id="scroll-mark" class="container py-4">
    <div class="row my-3">

        @component('components/sections/title', ['title' => 'Let\'s get started'])
        @slot('subtitle')
        You're just one step away from your {{config('membership.trial_duration')}} day free trial! Just fill out the form below to enjoy full access to all of our classes, programs, articles and much more.
        @endslot
        @endcomponent

        <div class="col-lg-10 col-md-12 col-sm-12 col-12 mx-auto mt-4">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-10 col-12 mx-auto mb-4">
                    @component('pages/register/form')
                        @slot('submitButton')
    
                            @include('components/buttons/spinner', [
                                'classes' => 'btn-red btn-block',
                                'label' => 'Create my account'])
                            
                        @endslot
                    @endcomponent
                </div>
                <div class="col-lg-5 col-md-5 col-sm-10 col-xs-10 mx-auto">
                    <div class="bg-light p-2 rounded text-center">
                        <p class="text-muted"><strong>Sign up with your social network</strong></p>
                        @include('pages/login/social')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
