<?php

namespace App\Services;

use App\Billing\Payment;
use Dompdf\Dompdf; 
use Illuminate\Support\Facades\View; 

class Pdf extends Dompdf
{
    /** 
     * Create a new pdf instance. 
     * 
     * @param  array $config 
     * @return void 
     */ 
    public function __construct(array $config = []) 
    { 
        parent::__construct($config);

        $this->getOptions()->setIsRemoteEnabled(true);
    }

    /** 
     * Determine if the use wants to download or view. 
     * 
     * @return string 
     */ 
    public function action() 
    { 
        return request()->has('download') ? 'attachment' : 'inline';
    }

    /**
     * Render the PDF.
     *
     * @param  \App\Payment  $payment
     * @return string
     */
    public function generate(Payment $payment)
    {
        $this->loadHtml(
            View::make('invoices/index', compact('payment'))->render()
        );

        $this->render();

        return $this->output();
    }
}
