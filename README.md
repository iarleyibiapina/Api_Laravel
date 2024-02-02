# Projeto focado em API

# Para executar:

> copiar projeto laravel

Rodar o comando
`php artisan db:seed --class=NoticiasSeeder`
para inserir dados no banco;

E depois iniciar o servidor local
<code>
php artisan serve --port=9000
</code>
<br>
A flag `--port` é opcional

Para testar:

Existem várias ferramentas externas para testar uma API, sendo uma delas:
Curl, Swagger, PostMan, StopLight.
Recomendo utilizar o PostMan, pois é uma ferramenta mais completa.

Os endpoints para fazer as requisições são:

---

GET 'sistema/noticias' - Pegando todas as noticias

---

GET 'sistemas/noticias/1' - Pegando uma noticia pelo ID

---

POST 'sitemas/noticias/1' - Fazendo envio de dados de uma noticia

PUT 'sistemas/noticias/1' - Atualizando dados de uma noticia

> ATENÇÃO <p>
> Para enviar dados via metodo Post e PUT, é preciso definir em 'PARAMS'
> a chave do input e o valor, que serão enviados. <p> _Atenção_ <p>
> A chaves precisam ser exatamente:
> 'nome_noticia'
> 'conteudo_noticia'

---

DELETE 'sistemas/noticias/1' - Deletando uma noticia

---

<br>

# Banco de dados:

Utilizei um banco de dados já existente e criei uma migration contendo apenas duas colunas sendo elas:
-Nome da noticia
-Conteudo da noticia

Após isso foi Criado uma NoticiaModel,
Defini dentro do model:
-o nome da tabela
-o nome da coluna da chave primaria (pois por padrão busca por 'id' e eu modifiquei para 'id_noticia_tbn');
-os campos que podem ser preenchidos (no caso apenas nome e conteudo)

<br>

# Controller e Rotas

<p>
portanto decidi definir todas as rotas como Api e Controller voltado para Api, sem dividir pastas para web.
</p>

<p>
Retirado prefixo - api/
em RouteServiceProvider.php
para melhor busca e uso.
</p>

<p>
Criado um NoticiaController por meio do comando
'php artisan make:controller NoticiaController -r'
adicionei a flag '-r' - que significa 'Resources' utilizando esta tag é criado um controller com funções já pre definidas para serem trabalhadas como API.
</p>

<p>
Em rotas:
supondo que estou criando uma api de um sistema existente.
então resolvi criar uma nomenclatura 'sistema' simulando uma url ja existente e logo após a rota para consumir dados da noticia </p>

```
GET 'sistema/noticias' - Pegando todas as noticias
```

```
GET 'sistemas/noticias/1' - Pegando uma noticia pelo ID
```

```
POST 'sitemas/noticias/1' - Fazendo envio de dados de uma noticia
```

```
PUT 'sistemas/noticias/1' - Atualizando dados de uma noticia
```

```
DELETE 'sistemas/noticias/1' - Deletando uma noticia
```

<br>
<p><strong>Exemplos de uso do PostMan:</strong></p>

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
