<div class="d-flex filter-container border-bottom">
    <div class="flex-grow-1">
        <form id="search-form">
            <div class="form-group mr-4">
                <div class="input-group">
                    <div class="input-group-prepend d-flex align-items-center justify-content-center px-3 cursor-pointer">
                        <i class="text-muted fas fa-search"></i>
                    </div>
                    <input type="text" class="pl-1 form-control border-0 d-block" placeholder="I'm looking for...">
                </div>
            </div>
        </form>
    </div>
    <div class="d-none d-sm-block">
        <form method="GET" action="{{$url}}">
            <div class="d-flex justify-content-between align-items-center">
                <div id="filters" class="form-row">
                    
                    @foreach($include as $filter)
                        @include("components/filters/options/{$filter}")
                    @endforeach
     
                </div>
            </div>
        </form> 
    </div>
</div>
<a href="{{$url}}" class="btn btn-link btn-sm link-none text-muted d-none d-sm-inline">Reset filters</a> 
{{-- <div id="filters-container" class="mt-2" style="display: none;">
    <a href="{{route('discover/classes')}}" class="btn-not-bold btn-link btn-sm link-none text-muted">Reset filters</a>
    @component('components/snippets/search-filter')
    @endcomponent
</div> --}}