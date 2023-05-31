<?php

namespace App\Http\Controllers\Map;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    public function index()
    {
        $outletQuery = Outlet::query();
        $outletQuery->where('name', 'like', '%'.request('q').'%');
        $outlets = $outletQuery->paginate(25);

        return view('layouts.outlets.index', compact('outlets'));
    }

    public function create()
    {
        return view('layouts.outlets.create');
    }

    public function store(Request $request)
    {
        $newOutlet = $request->validate([
            'name' => 'required|max:60',
            'address' => 'nullable|max:255',
            'latitude' => 'nullable|required_with:latitude|max:15',
            'longitude' => 'nullable|required_with:longitude|max:15',
        ]);
        $newOutlet['creator_id'] = auth()->id;
        $outlet = Outlet::create($newOutlet);
        return redirect()->route('layouts.outlets.show', $outlet);
    }

    public function edit(Outlet $outlet)
    {
        return view('layouts.outlets.edit', compact('outlet'));
    }

    public function show(Outlet $outlet)
    {
        return view('layouts.outlets.show', compact('outlet'));
    }

    public function update(Request $request, Outlet $outlet)
    {
        $OutletData = $request->validate([
            'name' => 'required|max:60',
            'address' => 'nullable|max:255',
            'latitude' => 'nullable|required_with:latitude|max:15',
            'longitude' => 'nullable|required_with:longitude|max:15',
        ]);
        $outlet->update($OutletData);
        return redirect()->route('layouts.outlets.show', $outlet);
    }

    public function destroy(Request $request, Outlet $outlet)
    {
        $request->validate([
            ['outlet_id' => 'required'],
        ]);

        if ($request->get('outlet_id') == $outlet->id && $outlet->delete()) {
            return redirect()->route('layouts.outlets.index');
        }

        return back();
    }
}
