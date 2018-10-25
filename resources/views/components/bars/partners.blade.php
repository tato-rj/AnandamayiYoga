<section class="row mb-7">
    <div class="container">
      <div class="row align-items-end justify-content-center">

        @include('components/sections/title', [
            'title' => 'Our Partners',
            'margin' => '0'])

        <div class="col-3 px-3 pb-3">
          <div class="px-5 py-4">
            <a href="" class="link-none">
              <img src="{{cloud('app/partners/company1.svg')}}" class="w-100 hover-grayscale-to-normal">
            </a>
          </div>
        </div>
        <div class="col-3 px-3 pb-3">
          <div class="px-5 py-4">
            <a href="" class="link-none">
              <img src="{{cloud('app/partners/company2.svg')}}" class="w-100 hover-grayscale-to-normal">
            </a>
          </div>
        </div>
        <div class="col-3 px-3 pb-3">
          <div class="px-5 py-4">
            <a href="" class="link-none">
              <img src="{{cloud('app/partners/company3.svg')}}" class="w-100 hover-grayscale-to-normal">
            </a>
          </div>
        </div>
        <div class="col-3 px-3 pb-3">
          <div class="px-5 py-4">
            <a href="" class="link-none">
              <img src="{{cloud('app/partners/company4.svg')}}" class="w-100 hover-grayscale-to-normal">
            </a>
          </div>
        </div>
      </div>
    </div>
</section>