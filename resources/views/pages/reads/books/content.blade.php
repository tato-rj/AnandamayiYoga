<section id="scroll-mark" class="container py-4">

    @title(['title' => 'Books'])

    <div class="row">
    	
    	<div class="col-lg-10 col-md-12 col-sm-12 col-12 mx-auto">
            @foreach($books as $book)
            @include('pages.reads.books.show')
            @endforeach
    	</div>
    </div>
</section>

<div class="modal fade" id="preview-slides" tabindex="-1" role="dialog" aria-labelledby="preview-slidesLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:none;background: transparent;border-radius: 0;">
    	<img src="" id="book-preview" class="figure-img img-fluid">
    </div>
  </div>
</div>
