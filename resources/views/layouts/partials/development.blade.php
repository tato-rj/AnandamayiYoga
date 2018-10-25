<div class="container">
    <div class="row align-items-center h-100vh">
        <div class="col-lg-4 col-md-6 col-sm-8 col-10 mx-auto text-center">
            <div>
                <img src="{{cloud('app/brand/logo-pink.svg')}}">
                <p class="lead mt-2">We are under development, please come back soon or use your password to continue</p>            
            </div>

            <form method="POST" action="/enter">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="password" name="gatepass" class="form-control {{(session()->has('denied')) ? 'is-invalid' : null}}" placeholder="Password">
                @if(session()->has('denied'))
                  <div class="invalid-feedback">
                    Ops, wrong password!
                  </div>
                @endif                    
                </div>
                <button type="submit" class="btn-bold btn-block btn-red">Continue</button>
            </form>
        </div>
    </div>
</div>