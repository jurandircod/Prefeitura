# Prefeitura Ramais

### Instalação

Navegue até a pasta **banco de dados**
Importe o banco de dados **prefeitura.sql**, que já vem carregado com informações de exemplo.
Clone os arquivos do repositório para a pasta www, htdocs ou a pasta do seu servidor web.
Estrutura do Código


## Model
Todas as classes dentro da pasta Model controlam o modelo de negócio e o acesso ao banco de dados.
Todas as classes possuem métodos/funções CRUD e estendem a classe read.php.
A classe read.php executa consultas SQL inseridas manualmente através do SqlRead e retorna os dados em forma de array.

## Controller
As classes create, têm o objetivo de instanciar e criar objetos, além de executar a inserção de dados no banco de dados.
O Controller também possui classes de pesquisa que retornam os resultados em formato JSON, permitindo captura instantânea pelo JavaScript via AJAX.
Além disso, gerencia os alertas que aparecem na tela atraves da classe Alerts.php.

## View
As classes na pasta View são responsáveis pela parte visual do projeto e pelo controle dos elementos visuais.

### Exemplo de Uso

Para entender melhor como utilizar o sistema, siga estas etapas básicas após a instalação:
Acesse a interface web no seu navegador.
Utilize as funcionalidades disponíveis para manipular os dados de exemplo ou adicione novos dados.
Observe como as alterações são refletidas instantaneamente na interface graças ao uso de AJAX.
**Email para acesso:admin@admin.com**
**Senha para acesso:admin123**

link de acesso funcional: **[site ramais](ramaiscruzeirodooeste.great-site.net)**
