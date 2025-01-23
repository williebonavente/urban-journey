<?php

namespace App\Http\Controllers;

use App\Models\Shoppeelift;
use Illuminate\Http\Request;

class ShoppeeliftController extends Controller
{
    public function index()
    {
        // Make this DB query instead of eloquent syntax
        // Display 7 items per page custom
        $shoppeelifts = Shoppeelift::paginate(7);
        return view('shoppeelifts.index', compact('shoppeelifts'));
    }

    public function create()
    {
        return view('shoppeelifts.create');
    }
    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
        ]);

        Shoppeelift::create($request->all());

        return redirect()->route('shoppeelifts.index')->with('success', 'Shoppeelift created successfully.');
    }

    public function edit($id)
    {
        $shoppeelift = Shoppeelift::find($id);
        return view('shoppeelifts.edit', compact('shoppeelift'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
        ]);

        $shoppeelift = Shoppeelift::find($id);
        $shoppeelift->update($request->all());
         return redirect()->route('shoppeelifts.index')
            ->with('success', 'Shoppeelift updated successfully.');

    }

    public function destroy($id)
    {
        Shoppeelift::destroy($id);
        return redirect()->route('shoppeelifts.index')
            ->with('success', 'Shoppeelift deleted successfully');
    }
}
