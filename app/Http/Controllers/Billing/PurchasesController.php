<?php

namespace App\Http\Controllers\Billing;

use App\Billing\Purchase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\Purchases\CoursePurchased;
use App\Course;

class PurchasesController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function course(Request $request, Course $course)
    {
        if (! $course->published)
            return redirect(route('courses.index'));
        
        try {
            
            (new Purchase)->withCoupon($request->coupon)->createCustomer($request->toArray())->charge(auth()->user());

        } catch (\Exception $e) {
            $response = ['error' => $e->getMessage()];

            return back()->with($response);
        }

        return redirect(route('courses.show', $course->slug))->with('status', "You have successfully purchased {$course->name}");
    }
}
