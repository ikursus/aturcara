<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class NotificationController extends Controller
{
    public function markAsRead($id)
    {
        $notification = Auth::user()->notifications()->find($id);

        $notification->markAsRead();

        return redirect()->route('home');
    }

    public function destroy()
    {
        Auth::user()->notifications()->delete();
        return redirect()->route('home');
    }
}
