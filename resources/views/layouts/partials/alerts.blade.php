{{-- SUCCESSFUL ACTION AT RUNTIME --}}
@component('components/alerts/popup', [
    'is_original' => true,
    'type' => 'success'])

    @slot('message')
        <span class="message"></span>
    @endslot
@endcomponent

{{-- ACTION FAILED AT RUNTIME --}}
@component('components/alerts/popup', [
    'is_original' => true,
    'type' => 'danger'])

    @slot('message')
        <ul class="message m-0 pl-3"></ul>
    @endslot
@endcomponent

{{-- SUCCESSFUL ACTION DISPLAYED ON LOAD --}}
@if(session('status'))
    @component('components/alerts/popup', [
        'is_original' => false,
        'type' => 'success',
        'display' => 'block'])
        @slot('message')
        {{ session('status') }}
        @endslot
    @endcomponent
@endif

{{-- ACTION FAILED DISPLAYED ON LOAD --}}
@if(session('error'))
    @component('components/alerts/popup', [
        'is_original' => false,
        'type' => 'danger',
        'display' => 'block'])
        @slot('message')
        {{ session('error') }}
        @endslot
    @endcomponent
@endif

{{-- FORM VALIDATION FEEDBACK --}}
@if(!empty($errors) && $errors->any())
    @component('components/alerts/popup', [
        'is_original' => false,
        'type' => 'danger',
        'display' => 'block'])
        @slot('message')
            We found {{$errors->count()}} {{str_plural('issue', $errors->count())}} with your request, please try again!
        @endslot
    @endcomponent
@endif
