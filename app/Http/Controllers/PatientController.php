<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(Patient $patient)
    {
        $patients = $patient->all();
        return view('patients.home', compact('patients'));
    }

    public function show(int $id, Patient $patient)
    {
        if (!$patient = $patient->find($id)) {
            return back();
        }

        return view('patients.show', compact('patient'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request, Patient $patient)
    {
        $data = $request->all();
        $data['password'] = md5('12345678');

        $patient->create($data);

        return redirect()->route('patients');
    }

    public function edit(int $id, Patient $patient)
    {
        if (!$patient = $patient->where('id', $id)->first()) {
            return back();
        }

        return view('patients.edit', compact('patient'));
    }

    public function update(int $id, Request $request, Patient $patient)
    {
        if (!$patient = $patient->find($id)) {
            return back();
        }

        $data = $request->all();
        $patient->update($data);

        return view('patients.show', compact('patient'));
    }

    public function destroy(int $id)
    {
        if (!$patient = Patient::find($id)) {
            return back();
        }

        $patient->delete();

        return redirect()->route('patients');
    }
}
