@component('components/modals/layout', [
  'id' => 'classes',
  'title' => 'Let\'s get started!',
  'size' => 'modal-lg'])
  
  <div class="modal-body text-center">
    <div class="row no-gutters">
      <div class="col-10 mx-auto text-center">
        <p class="lead py-2">Please select the styles and categories you are interested in</p>
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
        'label' => 'Start your '.config('membership.trial_duration').' day Free Trial',
        'color' => 'red',
        'weight' => 'bold',
        'extra' => 'mobile-block'])

  </div>
  <div class="text-muted text-center mb-4">
    <small>You'll get immediate and unlimited access to all of our classes and programs right away. The free trial begins the moment you sign up and we encourage you to explore our website to see all that we have to offer. If you have any questions please check out our <a class="link-blue" href="{{route('support.index')}}">support</a> page or <a class="link-blue" href="{{route('support.contact.show')}}">get in touch</a> with us.</small>
  </div>
@endcomponent