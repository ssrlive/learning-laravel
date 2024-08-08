<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function update()
    {
        // return back()->with('message', 'Avatar is changed!');
        return redirect(route('profile.edit'))->with('message', 'Avatar is changed!');
    }
}
