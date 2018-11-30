@component('components/modals/layout', [
  'id' => 'classes',
  'title' => __('Let\'s get started!'),
  'size' => 'modal-lg'])
  
  <div class="modal-body text-center">
    <div class="row no-gutters">
      <div class="col-10 mx-auto text-center">
        <p class="lead py-2">@lang('Please select the styles and categories you are most interested in')</p>
      </div>

      @foreach($categories as $category)
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 p-2">
            <button data-id="{{$category->id}}" class="bounce-to-right btn select-class rounded-0 btn-block btn-light text-muted">
                {{$category->name}}
            </button>
          </div>
      @endforeach

    </div>
  </div>
  <div class="text-right my-4">

    @include('components/buttons/simple', [
        'id' => 'classes-modal-submit',
        'path' => route('register'),
        'label' => __('Start your free trial'),
        'color' => 'red',
        'weight' => 'bold',
        'extra' => 'mobile-block'])

  </div>
  <div class="text-muted border-top pt-3 mb-3">
    <small>{!! __('You\'ll get immediate and unlimited access to all of our classes and programs right away. The free trial begins the moment you sign up and we encourage you to explore our website to see all that we have to offer. If you have any questions please check out our <a href="\support" class="link-red">support page</a> or <a href="\contact" class="link-red">get in touch</a> with us.') !!}</small>
  </div>
@endcomponent