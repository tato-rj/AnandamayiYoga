<div class="panel panel-default">
	<div class="panel-heading">
		<h5 class="panel-title"><strong>Order summary</strong></h5>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-sm">
				<thead>
                    <tr>
						<td><strong>Item</strong></td>
						<td></td>
						<td></td>
						<td class="text-right"><strong>Price</strong></td>
                    </tr>
				</thead>
				<tbody>
                    <tr>
                        <td id="item-name">{{$item->name}}</td>
                        <td></td>
                        <td></td>
                        <td class="text-right" id="item-cost">{{priceToCurrency('usd', $item->cost)}}
                            @if($item->name == config('membership.name'))/month
                            @endif</td>
                    </tr>
                    <tr class="border-top" style="border-color: black!important">
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0 text-right"><strong>Coupon</strong></td>
                        <td class="border-0 text-right" id="item-coupon"></td>
                    </tr>
                    <tr>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0 text-right"><strong>Total</strong></td>
                        <td class="border-0 text-right" id="item-total">{{priceToCurrency('usd', $item->cost)}}
                            @if($item->name == config('membership.name'))/month
                            @endif</td>
                    </tr>
				</tbody>
			</table>
		</div>
        <p class="text-danger d-block d-sm-none"><small>Swipe right<i class="ml-2 fas fa-long-arrow-alt-right"></i></small></p>
	</div>
</div>