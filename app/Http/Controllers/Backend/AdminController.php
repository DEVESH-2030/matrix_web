<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * constructor 
     */
    function __construct(User $user)
    {
        $this->user = $user;
        $this->view = '.backend.';
    }

    /**
     * Get all user
     */
    public function dashboard()
    {
        $users = $this->user::all();
        return view($this->view . 'dashboard', compact('users'));
    }

    public function getAllUsers()
    {
        $users = $this->user::all();
        return view($this->view . 'pages.user.index', compact('users'));
    }
    
}
