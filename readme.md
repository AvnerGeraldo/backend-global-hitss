Desafio Batalha Medieva
=======================

Descrição macro do jogo
-------------------------
Consiste em um jogo de RPG em turnos, onde há o duelo entre um humano e um orc.

API Restful
-----------

Endpoints

- `GET /personagens`: Busca todos os jogadores
- `GET /personagens/{id}`: Busca jogador por id
- `GET /turnos`: Busca todos os dados de turnos cadastrados
- `GET /turnos/{id}`: Busca por dados de um turno em específico
- `POST /turnos`: Cadastra o turno inicial de um jogo
	- payload: {
		id_jogador_inicial: Identificador do jogador que iniciará o turno
	}
- `PUT /turnos`: Atualiza o turno de um jogo
	- payload: {
		id_jogo: Identificador do jogo
		id_jogador_inicial: Identificador do jogador que iniciará o turno
	}
- `POST /batalhas`: Cadastra/Atualiza dados das batalhas entre os jogadores
	- payload: {
		id_jogo: Identificador do jogo
		id_personagem_dano: Identificador do jogador
		dano: Valor do dano a ser causado ao jogador
	}