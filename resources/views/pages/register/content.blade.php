<section id="scroll-mark" class="container py-4">

    @title(['title' => 'Let\'s get started'])

    <div class="row">

        <div class="col-lg-10 col-md-12 col-sm-12 col-12 mx-auto">
            <p class="lead mb-5 text-center">@lang('You\'re just one step away from your 15 day free trial! Just fill out the form below to enjoy full access to all of our classes, programs, articles and much more.')</p>
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-10 col-12 mx-auto mb-4">
                    @component('pages/register/form')
                        @slot('submitButton')
    
                            @include('components/buttons/spinner', [
                                'classes' => 'btn-red btn-block',
                                'label' => __('Create my account')])
                            
                        @endslot
                    @endcomponent
                </div>
                <div class="col-lg-5 col-md-5 col-sm-10 col-xs-10 mx-auto">
                    @include('pages/login/social')
                </div>
            </div>
        </div>
    </div>
</section>
