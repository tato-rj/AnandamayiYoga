@include('admin/components/multitype/field', [
  'display' => 'd-none original-type',
  'rows' => 1
])

@foreach($collection as $item)
  
  @include('admin/components/multitype/field', [
    'value' => $item->content,
    'rows' => 1
  ])

@endforeach    

@include('admin/components/multitype/add')
