<h1 align="center"> Projeto focado em API </h1>

<p> A ideia é criar um sistema que forneça dados de uma noticia (CRUD), ele possui autenticação JWT sendo necessária um registro de um usuario para consumir os dados de uma noticia. </p>

# Para executar:

<p> Primeiramente faça uma cópia do projeto </p>

---

git clone https://github.com/iarleyibiapina/Api_Laravel.git

---

Após isso entre na pasta do projeto e inicie em seu editor de cógigo, neste caso estarei me baseando no Visual Studio Code.

> Para entrar na pasta

---

cd Api_Laravel/

---

> Abrir o projeto no vsCode

---

code .

---

<hr>

<p> Abra o terminal e instale as dependencias do composer com: </p>

---

composer install

---

e aguarde a instalação

<hr>

<p> Ainda no terminal: </p> 
Gere uma chave de encriptação do Laravel:

---

php artisan key:generate

---

Gere uma chave secreta para o JWT

---

php artisan jwt:secret

---

<hr>

<p> Agora dentro do projeto é preciso configurar uma conexao ao banco de dados </p>

E para isto, faça uma cópia do arquivo `.env.example` retirando o sufixo `.example`
ou abrir o terminal no vsCode com 'ctrl + j' usar este comando:

---

cp .env.example .env

---

<p> Este comando irá criar uma copia do arquivo de configuração do projeto e você precisará definir: </p>

> Importante que você crie seu Banco de Dados MySql. Neste exemplo irei utilizar um banco de dados que havia criado chamado 'teste'.

> Para trabalhar com mysql estarei utilizando um servidor local chamado XAMPP, onde o módulo MySQL configurado na porta 3306 está ativo.

-   DB_CONNECTION=mysql
-   DB_HOST=127.0.0.1
-   DB_PORT=3306
-   DB_DATABASE=teste
-   DB_USERNAME=root
-   DB_PASSWORD=

<p> Por fim executar o comando 'migrate' para criar as novas tabelas no banco. </p>

---

php artisan migrate

---

<p> Para complementar o projeto, você tambem pode criar alguns dados falsos para melhor testar a API utilizando este comando:  </p>

---

php artisan db:seed --class=NoticiasSeeder

---

Este comando irá criar 20 linhas falsas na tabela noticias no banco.

---

php artisan db:seed --class=UserSeeder

---

Este comando irá criar um usuario falso na tabela users no banco.

<hr>

<p> Por fim, iniciar o servidor local para consumir a API. </p>

---

php artisan serve --port=9000

---

A flag `--port` é opcional, neste caso estarei iniciando na porta 9000 pois a padrão é a porta 8000 e você pode testar utilizando com outros projetos locais.

<hr>

# Para testar:

Existem várias ferramentas externas para testar uma API, sendo uma delas:
Curl, Swagger, PostMan, StopLight.
Recomendo utilizar o PostMan, pois é uma ferramenta mais completa.

Os endpoints para fazer as requisições são:

### Usuarios

-   Registrando no sistema, retornando o token JWT

> Enviar como Params - key, exatamente: <br>
> name <br>
> email <br>
> password <br>

---

POST 'sistema/registrar'

---

-   Fazer um login no sistema.

> Enviar como Params - key, exatamente: <br>
> email <br>
> password <br>

---

POST 'sistema/logar'

---

### Após logar será retornado a chave JWT que será necessária para as próximas requisições.

> A chave fica em: Data -> token , copie toda a chave para utilizar posteriormente.

<p> A partir de agora as rotas estarão protegidas, isso significa que nenhum usuario não logado no sistema poderá consumir estas rotas e que para utiliza-las é preciso definir a chave recuperada no login </p>

> A chave precisa ser adicionada em: <br>
> Authorization -> token bearer <br>
> e copiada no campo ao lado

![Adicionando Chave JWT](/public/readme/adicionando_chave_jwt.png)

<br>

-   Retorna o usuario logado neste momento.

---

GET 'user/'

---

-   Retorna uma lista de todos os usuarios cadastrados no sistema.

---

GET 'sistema/usuarios'

---

-   Faz logout no sistema

---

GET 'sistema/logout'

---

### Noticias

> Ainda utilizando a chave em authorization!

-   Pegando todas as noticias

---

GET 'sistema/noticias'

---

-   Pegando uma noticia pelo ID

---

GET 'sistemas/noticias/1'

---

> ATENÇÃO <p>
> Para enviar dados via metodo Post e PUT, é preciso definir em 'PARAMS'
> a chave do input e o valor, que serão enviados. <br>
> A chaves precisam ser exatamente: <br>
> 'nome_noticia' <br>
> 'conteudo_noticia'

-   Fazendo envio de dados de uma noticia

---

POST 'sitemas/noticias/1'

---

-   Atualizando dados de uma noticia

---

PUT 'sistemas/noticias/1'

---

-   Deletando uma noticia

---

DELETE 'sistemas/noticias/1'

---

<br>

## <p><strong>Exemplos de uso do PostMan:</strong></p>

<p>Metodo GET - all </p>

![Exemplo GET - all](/public/readme/getAll.png)
<br>

<p>Metodo GET - ById </p>

![Exemplo GET - ById](/public/readme/getById.png)
<br>

<p>Metodo POST</p>

![Exemplo POST](/public/readme/post.png)
<br>

<p>Metodo PUT</p>

![Exemplo PUT](/public/readme/put.png)
<br>

<p>Metodo DELETE</p>

![Exemplo DELETE](/public/readme/delete.png)
<br>

<h1 align="center"> Estrutura do projeto </h1>

# Banco de dados:

Após a migration duas colunas são criadas sendo elas:

-   Nome da noticia
-   Conteudo da noticia

Após isso foi Criado uma NoticiaModel,
Defini dentro do model:

-   O nome da tabela
-   O nome da coluna da chave primaria (pois por padrão busca por 'id' e eu modifiquei para 'id_noticia_tbn');
-   Os campos que podem ser preenchidos (no caso apenas nome e conteudo)

<br>

# Controller e Rotas

<p> Criado um `NoticiaController` por meio do comando </p>

---

## 'php artisan make:controller NoticiaController -r'

adicionei a flag '-r' - que significa 'Resources' utilizando esta tag é criado um controller com funções já pre definidas para serem trabalhadas como API.

</p>

<p>
Em rotas:
supondo que estou criando uma api de um sistema existente.
então resolvi criar uma nomenclatura 'sistema' simulando uma url ja existente e logo após a rota para consumir dados da noticia </p>

<br>

# Noticia Controller

Index - Retorna todas as noticias <br>

Store - Armazena a noticia <br>

Show - Exibe uma noticia passada como parametro <br>

Update - Atualiza uma noticia passada como parametro <br>

Delete - Deleta uma noticia passada como parametro <br>

<br>

# Faker

Faker é uma livraria externa que fornece dados falsos, muito utilizada para testar funcionalidades que precisam de dados.

O laravel possui uma função nativa `fake()` - que usa esta biblioteca e gera dados falsos

neste caso foi criado uma `Factory` nomeada de NoticiasModelFactory dentro de Database\Factory.

-   Factory, em laravel é um 'espaço' que tem como função gerar dados em grande quantidade, uma Fábrica de dados que foi utilizada para gerar dados falsos para testes.

E em Database\Seeders, um `NoticiasSeeder`, uma seeder tem como função 'chamar' uma factory executar e enviar para o banco de Dados.

User Seeder

Gera um usuario para testar resgistro, login e chave de JWT token

php artisan db:seed --class=UserSeeder

A senha padrão para usuario criado via seeder é: password
