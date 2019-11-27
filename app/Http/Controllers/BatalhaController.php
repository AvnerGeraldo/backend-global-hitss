<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use League\Flysystem\Exception;
use App\Jogo;

class BatalhaController extends Controller
{
    public function store(Request $request, Response $response)
    {
        try {
            $data = json_decode($request->getContent(), true);

            //Buscar Jogo
            $idJogo = $data['id_jogo'];

            if (empty($idJogo))
                throw new Exception('Informe o identificador do Jogo.');

            $jogo = Jogo::find($idJogo);
            $dadosJogo = $jogo->first();

            //Identificar a quem inflingir dano
            $idPersonagemDano = (int)$data['id_personagem_dano'];
            $dano = (int)$data['dano'];

            if (empty($idPersonagemDano))
                throw new Exception('Informe o personagem a ser atacado!');

            if (!in_array($idPersonagemDano, [$dadosJogo->id_personagem_orc, $dadosJogo->id_personagem_humano]))
                throw new Exception('Informe um personagem a ser atacado válido!');

            
            if ($dadosJogo->id_personagem_orc === $idPersonagemDano) {
                $danoOrc = $dadosJogo->vida_orc - $dano;
                $jogo->vida_orc = $danoOrc > 0 ? $danoOrc : 0;
            }

            if ($dadosJogo->id_personagem_humano === $idPersonagemDano) {
                $danoHumano = $dadosJogo->vida_humano - $dano;
                $jogo->vida_humano = $danoHumano > 0 ? $danoHumano : 0;
            }

            if ($jogo->save())
                return $response->setStatusCode(200, "OK");
        } catch(Exception $e) {
            return $response->setStatusCode(400, "Erro: {$e->getMessage()}");
        }
    }

    public function notAuthorized(Response $response) 
    {
        return $response->setStatusCode(401, 'Unauthorized');
    }
}
