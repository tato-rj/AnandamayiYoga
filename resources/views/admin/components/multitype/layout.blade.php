@include('admin/components/multitype/field', [
  'display' => 'd-none original-type',
  'rows' => 1
])

@foreach($collection as $item)
  
  @include('admin/components/multitype/field', ['value' => ['en' => $item->content, 'pt' => $item->content_pt]])

@endforeach    

@include('admin/components/multitype/add')
