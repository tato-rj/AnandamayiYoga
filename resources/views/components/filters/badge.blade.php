<span data-type class="badge filter-badge bg-blue text-white p-2 m-1" data-value={{$value}} style="display: none;">
	<input type="hidden" type="checkbox" name="{{$name}}" value="{{$value}}">
	<span id="filter-name">{{$slot}}</span><i class="fas cursor-pointer ml-2 fa-times"></i>
</span>