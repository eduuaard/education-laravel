<?php

namespace App\Http\Controllers;
use App\Models\UnidadeEnsino;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;

class UnidadeEnsinoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.unidade');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $unidade = UnidadeEnsino::create([
            'name' => $request->name,
        ]);

        return redirect()->intended(RouteServiceProvider::UNIDADE)->with('success','Unidade cadastrada com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(UnidadeEnsino $unidadeEnsino)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnidadeEnsino $unidadeEnsino)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UnidadeEnsino $unidadeEnsino)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnidadeEnsino $unidadeEnsino)
    {
        //
    }
}
