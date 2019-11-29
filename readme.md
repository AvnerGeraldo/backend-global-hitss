Desafio Batalha Medieva
=======================

Descrição macro do jogo
-------------------------
Consiste em um jogo de RPG em turnos, onde há o duelo entre um humano e um orc.

Instalando projeto
------------------

1 - Baixar projeto executando `git clone https://github.com/AvnerGeraldo/backend-global-hitss`
2 - Entrar na raiz do projeto e executar `composer install`
3 - Gerar uma cópia do arquivo `.env.example` e renomear para `.env`
4 - Alterar os parâmetros de conexão com o banco de dados abaixo para os seus dados de conexão:
- DB_CONNECTION
- DB_HOST
- DB_PORT
- DB_DATABASE
- DB_USERNAME
- DB_PASSWORD

5 - Gerar key do projeto executando `php artisan key:generate`
6 - Executar `php artisan migrate` para criar as tabelas no banco de dados
7 - Executar `php artisan db:seed` para gerar dados para as tabelas
8 - Iniciar aplicação `php artisan serve`

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