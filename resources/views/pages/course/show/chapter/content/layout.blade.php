<div id="scroll-mark" class="row no-gutters mb-5" style="margin-left: -15px; margin-right: -15px;">

	<div class="col-lg-9 col-md-9 col-sm-12 col-12 p-0">
		@include("pages/course/show/chapter/content/$content->className")

		@include('pages/course/show/chapter/content/discussion')
	</div>

	<div class="col-lg-3 col-md-3 col-sm-12 col-12 p-0">
		@include('pages/course/show/chapter/content/menu')
	</div>

</div>
