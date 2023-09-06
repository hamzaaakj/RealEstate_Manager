<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Residence;
use App\Models\User;
use App\Models\Apartement;

class ResidenceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $query = Residence::query();
    
        if ($search) {
            $query->where('ResidenceName', 'LIKE', '%' . $search . '%');
        }
        $residences = $query->withCount('apartments')->get();
        $residences = $query->paginate(9); // Number of apartments per page
    
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
        $request->validate([
            'ResidenceName' => 'required|string|max:255',
            'ResidenceNumber' => 'required|string|max:255',
        ]);
        Residence::create([
            'ResidenceName' => $request->input('ResidenceName'),
            'ResidenceNumber' => $request->input('ResidenceNumber'),
        ]);
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
        $request->validate([
            'ResidenceName' => 'required|string|max:255',
            'ResidenceNumber' => 'required|string|max:255',
        ]);
        $residence->update([
            'ResidenceName' => $request->input('ResidenceName'),
            'ResidenceNumber' => $request->input('ResidenceNumber'),
        ]);
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
    public function countResidencesAndApartments()
{
    $residenceCount = Residence::count();
    $apartmentCount = Apartement::count();
    $userCount = User::where('is_admin', 0)->count();

    $soldApartmentsCount = Apartement::where('Status', 'Sold')->count();
    $availableApartmentsCount = Apartement::where('Status', 'Available')->count();
    $ReservedApartmentsCount = Apartement::where('Status', 'Reserved')->count();

    return view('dashboard', compact('residenceCount', 'apartmentCount', 'userCount', 'soldApartmentsCount', 'availableApartmentsCount','ReservedApartmentsCount'));
}
}
