<?php

namespace App\Http\Controllers;

use App\{User, Category, Feedback};
use App\Events\{UserDeletedAccount, UserSignedUp};
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function courses()
    {
        return view('pages/user/dashboard/index', [
            'show' => ['courses'],
            'limit' => null
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function findOrCreate($userData)
    {
        $user = User::where(['email' => $userData->email])->first();

        if (! $user) {
            $user = User::create([
                'first_name' => splitName($userData->name)[0],
                'last_name' => splitName($userData->name)[1],
                'email' => $userData->email,
                'avatar_path' => $userData->avatar_original,
                'lang' => app()->getLocale(),
                'password' => bcrypt('secret'),
                'confirmed' => false,
                'confirmation_token' => str_random(25)
            ]);

            event(new UserSignedUp($user));
        }
        
        return $user;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'string|min:2|max:255',
            'last_name' => 'string|min:2|max:255',
            'email' => 'string|email|max:255|unique:users',
            'level_id' => 'number',
            'dob' => 'date',
            'lang' => 'string',
            'currency' => 'string',
            'timezone' => 'string',
            'password' => 'string|min:6'
        ]);

        if ($request->has('password')) {
            auth()->user()->update(['password' => bcrypt($request->password)]);
        } else {
            auth()->user()->update($request->all());
        }

        return response('Your update was successful.', 200);
    }

    public function updateLevel($levelId)
    {
        auth()->user()->level()->associate($levelId)->save();

        return response('Your level has updated.', 200);
    }

    public function updateCategory($categoryId)
    {
        $category = Category::find($categoryId);

        try {
            auth()->user()->categories()->save($category);  
        } catch (\Exception $e) {
            auth()->user()->categories()->detach($category);
        }

        return response('Your category has updated.', 200);
    }

    public function recordLogin()
    {
        auth()->user()->recordLogin();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Feedback::create([
            'about' => 'delete',
            'email' => auth()->user()->email,
            'comment' => "$request->reason. $request->comment"
        ]);

        auth()->user()->delete();

        return redirect(route('feedback.delete'))->with('user-deleted', 'ok');
    }
}
