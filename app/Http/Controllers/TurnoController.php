<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Jogo;
use App\Personagem;
use League\Flysystem\Exception;

class TurnoController extends Controller
{
    public function store(Request $request, Response $response)
    {
        try {
            $idJogadorInicial = $request->input('id_jogador_inicial');
            
            if (empty($idJogadorInicial))
                throw new Exception('Informe o jogador inicial.');
                
            //Buscar Jogadores
            $personagemOrc = Personagem::where('nome', 'orc')->first();
            $personagemHumano = Personagem::where('nome', 'humano')->first();

            //Criar Jogo
            $jogo = new Jogo();
            $jogo->turno = 1;
            $jogo->jogador_iniciante = $idJogadorInicial;
            $jogo->id_personagem_orc = $personagemOrc->id;
            $jogo->vida_orc = $personagemOrc->vida;
            $jogo->id_personagem_humano = $personagemHumano->id;
            $jogo->vida_humano = $personagemHumano->vida;

            if ($jogo->save())
                return $jogo->id;

        } catch(Exception $e) {
            return $response->setStatusCode(400, "Erro: {$e->getMessage()}");
        }
    }

    public function update(Request $request, Response $response, $id)
    {
        try {
            //Buscar Jogo
            $jogo = Jogo::find($id);

            $dadosJogo = $jogo->first();

            if (empty($dadosJogo))
                throw new Exception('Você está tentando atualizar um jogo que não existe! Inicie um primeiro.');

            //Id jogador inicial
            $idJogadorInicial = $request->input('id_jogador_inicial');

            if (empty($idJogadorInicial))
                throw new Exception('Informe o jogador inicial.');

            //Buscar Jogadores
            
            $jogadorExiste = Personagem::where('id', $idJogadorInicial)->first();
            if (empty($jogadorExiste))
                throw new Exception('Informe um jogador inicial válido.');
            
            //Atualizar Jogo
            $jogo->turno = $dadosJogo->turno + 1;
            $jogo->jogador_iniciante = $idJogadorInicial;

            if ($jogo->save())
                return $response->setStatusCode(200, "OK");
        } catch(Exception $e) {
            return $response->setStatusCode(400, "Erro: {$e->getMessage()}");
        }
    }
}
