<div class="table-responsive">
  <table class="table table-sm">
    <thead>
      <tr>
        <th scope="col" style="width: 25%">Date</th>
        <th scope="col" style="width: 50%">Payment</th>
        <th scope="col" style="width: 12.5%">Status</th>
        <th scope="col" style="width: 12.5%">Invoice</th>
      </tr>
    </thead>
    <tbody>
      @foreach($user->payments as $payment)
        <tr>
          <th scope="row">{{$payment->date}}</th>
          <td class="border-0">{{$payment->usd}}</td>
          <td class="border-0">{!! $payment->status !!}</td>
          <td class="border-0">
            <a href="{{route('user.invoice', [$user->id, $payment->id])}}" target="_blank" class="link-blue">
              <i class="fas fa-file-alt"></i>
            </a>
          </td>
        </tr>
        <tr>
          <td colspan="4" class="text-muted border-0"><small><i class="fas fa-info-circle mr-2"></i>{{$payment->description}}</small></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>