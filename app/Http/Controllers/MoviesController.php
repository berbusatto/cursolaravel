<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoviesController extends Controller
{

    public function __invoke(Request $request)
    {
        dd('INVOKE firebaaaaaaaaaaal');
    }
}
