<?php

namespace App\Http\Controllers\Users;

use App\Events\UserChangesAvatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ImageOptimizer;
use App\Http\Controllers\Controller;

class AvatarController extends Controller
{
    public function store(Request $request)
    {
    	$request->validate([
    		'avatar' => 'required|image|max:800'
    	]);
    	
    	$user = auth()->user();

        $user->deleteAvatar();

    	$user->update([
    		'avatar_path' => cloud($request->file('avatar')->store(cloudEnv()."/avatars/{$user->id}", 's3'))
    	]);

        event(new UserChangesAvatar($user));
    }
}
