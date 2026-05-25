<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    // READ + SEARCH
    public function index(Request $request)
    {
        $search = $request->search;

        $partners = Partner::when($search, function ($query) use ($search) {

            $query->where('name', 'LIKE', '%' . $search . '%');

        })->latest()->get();

        return view('admin.partners.index', compact('partners'));
    }

    // FORM CREATE
    public function create()
    {
        return view('admin.partners.create');
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'logo_url' => 'required|url',
        ]);

        Partner::create([
            'name' => $request->name,
            'logo_url' => $request->logo_url,
        ]);

        return redirect('/admin/partners')
            ->with('success', 'Partner berhasil ditambahkan');
    }

    // FORM EDIT
    public function edit($id)
    {
        $partner = Partner::findOrFail($id);

        return view('admin.partners.edit', compact('partner'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'logo_url' => 'required|url',
        ]);

        $partner = Partner::findOrFail($id);

        $partner->update([
            'name' => $request->name,
            'logo_url' => $request->logo_url,
        ]);

        return redirect('/admin/partners')
            ->with('success', 'Partner berhasil diupdate');
    }

    // DELETE
    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);

        $partner->delete();

        return redirect('/admin/partners')
            ->with('success', 'Partner berhasil dihapus');
    }
}