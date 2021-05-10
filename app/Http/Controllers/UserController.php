<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function checkUniqueEmail($email)
    {
        return response()->json(!User::where('email', $email)->exists());
    }
}
