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
