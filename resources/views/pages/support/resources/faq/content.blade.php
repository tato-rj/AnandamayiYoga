@component('pages/support/resources/show', ['title' => 'Frequently asked questions'])

@slot('menu')
	@include('pages/support/resources/menu', ['faq' => 'font-weight-bold'])
@endslot

@component('pages/support/resources/faq/show')
@slot('question')
Nullam suscipit metus tincidunt nulla viverra rutrum?
@endslot
@slot('answer')
Nunc at faucibus justo. Praesent tortor dui, consectetur a tortor in, mattis dignissim massa. Praesent vehicula ipsum id erat commodo, at dignissim metus luctus.
@endslot
@endcomponent

@component('pages/support/resources/faq/show')
@slot('question')
Duis aliquam id ligula ac aliquam?
@endslot
@slot('answer')
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut mi eros. Praesent semper leo vel ligula blandit, sed pretium tellus gravida. Maecenas sit amet bibendum tellus.
@endslot
@endcomponent

@component('pages/support/resources/faq/show')
@slot('question')
Aenean sed est sed sapien vestibulum dictum ac ut orci?
@endslot
@slot('answer')
Praesent posuere rhoncus nibh ac blandit. Donec vitae nunc in nisi varius condimentum sed eget nibh. Sed dapibus feugiat augue, sed efficitur erat egestas eu. Suspendisse non eros eget turpis hendrerit vestibulum eu a enim. In interdum ligula in dui facilisis, nec pharetra mi ultrices.
@endslot
@endcomponent

@component('pages/support/resources/faq/show')
@slot('question')
Class aptent taciti sociosqu ad litora torquent nostra?
@endslot
@slot('answer')
Suspendisse augue erat, fringilla vitae pulvinar imperdiet, blandit nec tortor. Morbi id nibh rhoncus, auctor velit in, pharetra augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed lacinia, diam vitae feugiat posuere, odio mi tincidunt lacus, et gravida odio leo ut felis.
@endslot
@endcomponent

@component('pages/support/resources/faq/show')
@slot('question')
Sed imperdiet tortor fringilla eros pellentesque luctus?
@endslot
@slot('answer')
Sed dictum felis sapien, eget volutpat ligula dictum eget. Phasellus eu malesuada eros. Morbi bibendum sem ut purus finibus, vel fringilla arcu pretium. Sed a lacus lorem.
@endslot
@endcomponent

@component('pages/support/resources/faq/show')
@slot('question')
Sed finibus posuere nisi?
@endslot
@slot('answer')
Curabitur vitae pulvinar eros, efficitur iaculis felis. Integer nec tellus nulla. Curabitur luctus pellentesque fermentum. Mauris fermentum vel nisl sed scelerisque. Quisque a libero turpis.
@endslot
@endcomponent

@component('pages/support/resources/faq/show')
@slot('question')
Praesent posuere rhoncus nibh ac blandit?
@endslot
@slot('answer')
Nulla facilisis libero at tellus convallis convallis. Ut sed tortor tincidunt, fermentum mauris at, lacinia urna. Duis non bibendum urna. Donec venenatis mauris ipsum. Aenean quis nisi lacus. Nam id magna ipsum.
@endslot
@endcomponent

@component('pages/support/resources/faq/show')
@slot('question')
Curabitur vitae pulvinar eros, efficitur iaculis felis?
@endslot
@slot('answer')
Proin lacus massa, volutpat eu elit ut, consectetur elementum felis. Sed nunc odio, volutpat non interdum sit amet, accumsan id leo. Cras in nibh lorem. Donec ut ante velit. Pellentesque vitae orci sed ante malesuada maximus ac a sapien.
@endslot
@endcomponent

@endcomponent