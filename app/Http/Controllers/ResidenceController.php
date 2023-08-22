<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Residence;

class ResidenceController extends Controller
{
    public function index()
    {
        $residences = Residence::withCount('apartments')->get();
        return view('residences.index', compact('residences'));
    }

    public function create()
    {
        if (Gate::denies('is-admin')) {
            abort(403, 'Unauthorized');
        }
        return view('residences.create');
    }
    public function show(Residence $residence)
    {
        return view('residences.show', compact('residence'));
    }

    public function store(Request $request)
    {
        if (Gate::denies('is-admin')) {
            abort(403, 'Unauthorized');
        }
        Residence::create($request->all());
        return redirect()->route('residences.index')->with('success', 'Residence created successfully.');
    }

    public function edit(Residence $residence)
    {
        if (Gate::denies('is-admin')) {
            abort(403, 'Unauthorized');
        }
        return view('residences.edit', compact('residence'));
    }

    public function update(Request $request, Residence $residence)
    {
        if (Gate::denies('is-admin')) {
            abort(403, 'Unauthorized');
        }
        $residence->update($request->all());
        return redirect()->route('residences.index')->with('success', 'Residence updated successfully.');
    }

    public function destroy(Residence $residence)
    {
        if (Gate::denies('is-admin')) {
            abort(403, 'Unauthorized');
        }
        $residence->delete();
        return redirect()->route('residences.index')->with('success', 'Residence deleted successfully.');
    }
}
