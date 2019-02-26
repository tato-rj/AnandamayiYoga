<section id="scroll-mark" class="container py-4">

    @title(['title' => 'Our teachers'])

    <div class="row">

        <div class="col-lg-8 col-md-10 col-sm-12 col-12 mx-auto mb-4">
            <p class="lead">@lang('Our classes are taught by experienced and certified teachers who embody yoga and teach with an intimate understanding of the classic yoga texts and various yoga traditions.')</p>
        </div>

        <div class="col-lg-8 col-md-10 col-sm-12 col-12 mx-auto">
            {{-- @foreach($teachers as $teacher) --}}
                @include('components.teacher.display', ['link' => route('teachers.show', $teachers->first()->slug)])
            {{-- @endforeach --}}
        </div>
    </div>
</section>