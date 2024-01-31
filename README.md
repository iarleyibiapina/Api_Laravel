Projeto focado em API
portanto decidi definir todas as rotas como Api e Controller voltado para Api, sem dividir pastas para web.

Retirado prefixo - api/
em RouteServiceProvider.php
para melhor busca e uso.

# Banco de dados:

Utilizei um banco de dados já existente e criei uma migration contendo apenas duas colunas sendo elas:
-Nome da noticia
-Conteudo da noticia

Após isso foi Criado uma NoticiaModel,
Defini dentro do model:
-o nome da tabela
-o nome da coluna da chave primaria (pois por padrão busca por 'id' e eu modifiquei para 'id_noticia_tbn');
-os campos que podem ser preenchidos (no caso apenas nome e conteudo)

# Controller e Rotas

Criado um NoticiaController por meio do comando
'php artisan make:controller NoticiaController -r'
adicionei a flag '-r' - que significa 'Resources' utilizando esta tag é criado um controller com funções já pre definidas para serem trabalhadas como API.

Em rotas:
supondo que estou criando uma api de um sistema existente.
então resolvi criar uma nomenclatura 'sistema' simulando uma url ja existente e logo após a rota para consumir dados da noticia

GET 'sistema/noticias' - Pegando todas as noticias  
GET 'sistemas/noticias/1' - Pegando uma noticia pelo ID
POST 'sitemas/noticias/1' - Fazendo envio de dados de uma noticia
PUT 'sistemas/noticias/1' - Atualizando dados de uma noticia
DELETE 'sistemas/noticias/1' - Deletando uma noticia
