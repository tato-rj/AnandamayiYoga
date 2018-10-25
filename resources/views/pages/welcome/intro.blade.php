<section id="scroll-mark" class="container mb-8">
    <div class="row">

        @include('components/sections/title', [
            'title' => 'Why should I practice Yoga?'])

        <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto">
            <div>
                <p>Yoga is a journey to mental, physical and spiritual development. It gives us a wide range of techniques to
                balance and harmonize our body and mind, which are not separate structures; they are deeply engaged
                and intertwined.</p>
                <p class="d-none d-sm-block">Through a group of physical, mental, and spiritual practices we purify and transform our minds, invoking
                a shift in our consciousness to higher levels of perception, gradually awakening to a more blissful and
                meaningful life.</p>

                <div class="mt-5">

                    <div class="text-center"> 
                    @include('components/buttons/simple', [
                        'path' => route('about.our-platform'),
                        'label' => 'Click here to learn more',
                        'color' => 'outline-red'])
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
