<?php

namespace App\Http\Controllers\Billing;

use App\Billing\Payment;
use App\User;
use App\Services\Pdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PdfController extends Controller
{
    protected $pdf;

    /**
     * Create a new controller instance.
     *
     * @param  \App\Services\Pdf  $pdf
     * @return void
     */
    public function __construct(Pdf $pdf)
    {
        $this->pdf = $pdf;
    }

    public function invoice(User $user, Payment $payment)
    {
        return response($this->pdf->generate($payment), 200)->withHeaders([
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => "{$this->pdf->action()}; filename='invoice-{$payment->id}.pdf'",
        ]);
    }
}
