<?php

namespace App\Http\Controllers;

use View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Site controller.
 */
class SiteController extends Controller
{
    function index()
    {
        return View::make('site.index');
    }
}
