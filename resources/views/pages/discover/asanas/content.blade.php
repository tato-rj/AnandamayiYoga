<section id="scroll-mark" class="container py-4">
    <div class="row my-3">
        @include('components/sections/title', ['title' => 'Glossary of Asanas'])
    </div>        

    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-12">
            <form>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend d-flex align-items-center justify-content-center pr-2 cursor-pointer">
                            <i class="text-muted fas fa-search"></i>
                        </div>
                        <input type="text" value="{{request('search')}}" name="search" class="pl-1 form-control border-0 d-block" placeholder="I'm looking for...">
                    </div>
                </div>
                <div class="form-group">
                    <label><strong>Category</strong></label>               
                    @foreach($asanaTypes as $type)
                    <div class="form-check custom-control custom-checkbox"> 
                        <input class="custom-control-input"
                               name="types[]" 
                               type="checkbox"
                               id="type-{{$type->id}}" 
                               value="{{$type->slug}}" onchange="this.form.submit()"
                               @inArray(request('types'), $type->slug) checked @endinArray>
                       <label class="mb-1 custom-control-label" for="type-{{$type->id}}">{{$type->name}}</label>
                    </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label><strong>Sub-category</strong></label>               
                    @foreach($asanaSubtypes as $type)
                    <div class="form-check custom-control custom-checkbox"> 
                        <input class="custom-control-input"
                               name="subtypes[]" 
                               type="checkbox"
                               id="subtype-{{$type->id}}" 
                               value="{{$type->slug}}"
                               onchange="this.form.submit()"
                               @inArray(request('subtypes'), $type->slug) checked @endinArray>
                       <label class="mb-1 custom-control-label" for="subtype-{{$type->id}}">{{$type->name}}</label>
                    </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label><strong>Level</strong></label>               
                    @foreach($levels as $level)
                    <div class="form-check custom-control custom-checkbox"> 
                        <input class="custom-control-input"
                               name="levels[]" 
                               type="checkbox"
                               id="level-{{$level->id}}" 
                               value="{{$level->name}}"
                               onchange="this.form.submit()"
                               @inArray(request('levels'), $level->name) checked @endinArray>
                       <label class="mb-1 custom-control-label" for="level-{{$level->id}}">{{$level->name}}</label>
                    </div>
                    @endforeach
                </div>
            </form>
        </div>
        
        <div class="col-lg-9 col-md-9 col-sm-12 col-12">
            <div id="asanas-container" class="row w-100 position-relative ml-0">
                @include('pages/discover/asanas/show')
            </div>
        </div>
    </div>

</section>
