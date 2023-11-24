<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pergunta;

class PerguntaListController extends Controller
{
    public function index()
    {
        $data = Pergunta::orderBy('id','DESC')->get();
        return view('admin.user.pergunta-list', compact('data'));
    }

}
