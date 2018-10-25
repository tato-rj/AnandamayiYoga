@extends('layouts/raw')

@section('content')

<div class="text-center mb-4">
	<img src="{{cloud('app/brand/logo-pink.png')}}" style="width: 80px" class="mb-2">
	<p><strong>AnandamayiYoga</strong> <span class="text-muted">Invoice</span></p>
</div>

<div class="m-2 mb-4">
	<p class="m-0"><small><strong>INVOICE ID</strong></small></p>
	<p class=""><small>{{$payment->charge_id}}</small></p>

	<p class="m-0"><small><strong>TO</strong></small></p>
	<p class=""><small>{{$payment->user->fullName}} - {{$payment->user->email}}</small></p>

	<p class="m-0"><small><strong>FROM</strong></small></p>
	<p class=""><small>AnandamayiYoga.com</small></p>

	<p class="m-0"><small><strong>PAYMENT METHOD</strong></small></p>
	<p class="m-0"><small>{{$payment->card_brand}} - {{$payment->card_last_four}}</small></p>
</div>

<div class="table-responsive">
  <table class="table table-sm">
    <thead>
      <tr>
        <th scope="col" style="width: 25%">Date</th>
        <th scope="col" style="width: 62.5%">Payment</th>
        <th scope="col" style="width: 12.5%">Status</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <th scope="row">{{$payment->date}}</th>
          <td class="border-0">{{$payment->usd}}</td>
          <td class="border-0">{!! $payment->status !!}</td>
        </tr>
        <tr>
          <td colspan="4" class="text-muted border-0"><small>{{$payment->description}}</small></td>
        </tr>
    </tbody>
  </table>
</div>

@endsection