<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class OutsourcingController extends Controller
{
    public function index($slug = null)
    {
        return Inertia::render('Outsourcing', []);
    }
}
