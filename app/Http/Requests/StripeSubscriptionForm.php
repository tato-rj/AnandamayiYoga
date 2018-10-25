<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Billing\Membership;

class StripeSubscriptionForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !! $this->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'stripeEmail' => 'required|email',
            'stripeToken' => 'required'
        ];
    }

    public function save()
    {
        $message;

        if (! auth()->user()->hasMembership()) {
            try {
                (new Membership)->withCoupon($this->coupon)->createCustomer($this->stripeToken);

                if ($this->coupon) {
                    $message = ['status' => 'You have activated your account and the coupon has been successfully applied!'];
                } else {
                    $message = ['status' => 'You have successfully activated your account!']; 
                }
            } catch (\Exception $e) {    
                $message = ['error' => $e->getMessage()];
            }
        } else {
            auth()->user()->membership->withCoupon()->updateCustomer($this->stripeToken);

            $message = ['status' => 'Your card has been updated'];
        }

        return $message;
    }
}
