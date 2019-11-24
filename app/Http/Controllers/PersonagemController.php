<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Personagem;

class PersonagemController extends Controller
{
    public function index() {
        return Personagem::with('arma')->get();
    }

    public function show($id)
    {
        return Personagem::with('arma')->where('id', $id)->get();
    }

    public function notAuthorized(Response $response) 
    {
        return $response->setStatusCode(401, 'Unauthorized');
    }
}
