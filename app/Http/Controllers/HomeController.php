<?php

namespace App\Http\Controllers;

use App\Models\Patient;

class HomeController extends Controller
{
    public function index()
    {
        $patient = new Patient();
        $totalPatients = $patient->count();

        return view('welcome', compact('totalPatients'));
    }
}
