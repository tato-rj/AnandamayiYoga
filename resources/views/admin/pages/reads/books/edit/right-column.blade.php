<div class="col-lg-9 col-md-8 col-sm-12 col-12 mx-auto">
  @editInput([
    'name' => 'title', 
    'label' => 'The title of this book is',
    'id' => "title-{$book->id}", 
    'path' => route('admin.reads.books.update', $book->id),
    'value' => $book->title
    ])

  @editInput([
    'name' => 'subtitle', 
    'label' => 'The subtitle of this book is',
    'id' => "subtitle-{$book->id}", 
    'path' => route('admin.reads.books.update', $book->id),
    'value' => $book->subtitle
    ])
    
  @editTrix([
    'name' => 'description', 
    'label' => 'The description of this book is',
    'id' => "description-{$book->id}", 
    'path' => route('admin.reads.books.update', $book->id),
    'value' => strip_tags($book->description, '<br><strong><em><img><sub><sup><small><div><h1><h2><p>')
    ])

  @editInput([
    'name' => 'amazon_url', 
    'label' => 'The amazon link for this book is',
    'id' => "amazon_url-{$book->id}", 
    'path' => route('admin.reads.books.update', $book->id),
    'value' => $book->amazon_url
    ])

</div>