<?php

namespace App\Http\Controllers;

use App\Models\Repositorio;
use Illuminate\Http\Request;

class RepositorioController extends Controller
{
    public function index()
    {
        $repositorios = Repositorio::all();
        return response()->json($repositorios)
                         ->header('Access-Control-Allow-Origin', '*')
                         ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                         ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }
}
