<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $messages = Auth::user()->messages()->get();
        $users = User::all();
        return view('/pages/page', compact('messages', 'users'));
    }
}
