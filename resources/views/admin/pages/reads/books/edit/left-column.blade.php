<div class="col-lg-3 col-md-4 col-sm-12 col-12">
	{{-- COVER IMAGE --}}
	@include('admin/components/uploads/image-edit', [
	'image' => $book->image_path,
	'path' => route('admin.reads.books.image.update', $book->id)])

  {{-- TOPIC --}}
  <div class="form-group edit-control" name="lang" id="lang-{{$book->id}}">
    
    @include('components.form.edit.label', [
      'title' => 'This book is written in',
      'id' => "lang-{$book->id}",
      'path' => route('admin.reads.books.update', $book->id)
    ])

    <select disabled class="form-control">
      <option value="en" @match($book->lang, 'en') selected @endmatch>English</option>
      <option value="pt" @match($book->lang, 'pt') selected @endmatch>Português</option>
    </select>

  </div>
</div>
