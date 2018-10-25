<div class="modal fade" id="welcome" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body d-flex flex-column justify-content-center">
        <div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="welcome-carousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner pb-4">
            {{-- CARD --}}
            <div class="carousel-item active">
              <div class="cards row">
                <div class="col-12 text-center">
                  <img src="{{cloud('app/welcome/welcome.png')}}" style="width: 80%; max-width: 20em;">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-10 col-xs-10 mx-auto mt-4 text-center">
                  <p class="lead mb-4">WELCOME TO <span class="text-red"><strong>ANANDAMAYI</strong></span> YOGA</p>
                  <p>We're so glad you joined us! Your <strong>free trial</strong> period starts today and will end in 15 days.</p>
                  <p>Feel free to explore the platform, you'll love it!</p>         
                </div>
              </div>
            </div>
            {{-- CARD --}}
            <div class="carousel-item">
              <div class="cards row">
                <div class="col-12 text-center">
                  <img src="{{cloud('app/welcome/browse.png')}}" style="width: 80%; max-width: 20em;">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-10 col-xs-10 mx-auto mt-4 text-center">
                  <p class="lead mb-4">FIND OUR CLASSES</p>
                  <p>We'll show you recommended classes based on your preferences! You can find these right on your dashboard.</p>
                  <p>On the discover tab you will find all of our courses and classes.</p>
                </div>
              </div>
            </div>
            {{-- CARD --}}
            <div class="carousel-item">
              <div class="cards row">
                <div class="col-12 text-center">
                  <img src="{{cloud('app/welcome/routine.png')}}" style="width: 80%; max-width: 20em;">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-10 col-xs-10 mx-auto mt-4 text-center">
                  <p class="lead mb-4">CREATE A ROUTINE</p>
                  <p>Personalized <strong>Yoga Routine</strong>! Just submit a routine request and we will create the perfect schedule for you.</p>
                  <p>Follow your progress and feel the benefit of your commitment.</p>          
                </div>
              </div>
            </div>
            {{-- END OF CARDS --}}
          </div>
        </div>
        <ol class="carousel-indicators" style="bottom: 0;">
          <li data-target="#welcome-carousel" data-slide-to="0" class="bullets active"></li>
          <li data-target="#welcome-carousel" data-slide-to="1" class="bullets"></li>
          <li data-target="#welcome-carousel" data-slide-to="2" class="bullets"></li>
        </ol>
      </div>
      <div>  
      </div>
      <div class="modal-footer border-0 justify-content-center pb-4">
        <button type="button" class="carousel-next btn btn-outline-red px-5" style="border-radius: 0.2rem;">Next</button>
      </div>
    </div>
  </div>
</div>
