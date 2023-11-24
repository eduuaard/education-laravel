<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function dashboard()
    {
        $user = Auth()->user();

        // Verifica o nível do usuário
        $nivelUsuario = $user->nivel;
        $userId = $user->id;

        //Total de unidades
        $totalUnidades = DB::table('numunidade')
            ->value('numuni');

        // Se for administrador (nível 0), busca a média geral
        if ($nivelUsuario == 0) {
            $mediaPontuacao = DB::table('mediageral')
                ->value('totpon');
        } else {
            // Se não for administrador, busca a média apenas para o próprio usuário
            $mediaPontuacao = DB::table('mediaaluno')
                ->selectRaw('AVG(totpon) as media')
                ->where('user_id', $userId)
                ->value('media');
        }

        //Total de alunos
        $totalAlunos = DB::table('numaluno')
            ->value('numalu');

        // Busca o total de perguntas e o total de pontos sobre todas as perguntas
        $totalPerguntas = DB::table('totpergunta')
            ->value('qtdper');

        $totalPontosPerguntas = DB::table('totpergunta')
            ->value('totpon_per');

        return view('dashboard', compact('totalPerguntas', 'totalPontosPerguntas', 'nivelUsuario', 'mediaPontuacao', 'totalUnidades', 'totalAlunos'));
    }

    public function register()
    {
        return view('admin.user.register-user');
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('admin.profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
