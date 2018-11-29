<div class="mx-2 mb-4" style="width: 196px; height: 271.6px">
  <div class="rounded border hover-shadow-light p-0 t-2 h-100">
    <div class="bg-full rounded-top position-relative h-100" 
         style="background-image:url({{cloud($book->image_path)}});">

     @include('admin.components.cards.controls', [
        'model' => $book, 
        'routes' => [
          'edit' => route('admin.reads.books.update', $book->id), 
          'delete' => route('admin.reads.books.destroy', $book->id)]])

    </div>
  </div>
</div>