==== Descrição ===

A integração é simples e consiste em 3 constantes que estão declaradas no 'wp-config.php', que são: RD_STATION_IDENTIFICACAO, RD_STATION_TOKEN e RD_STATION_API, que são os campos de identificador, token, e a URL da API, respectivamente.

O processo de envio por post se dá por conta da função wp_remote_post, que envia uma requisição POST para a API, utilizando as funções nativas da HTTP API do WordPress para este feito.

O plugin de formulário tem como padrão três inputs "Nome, Email e Telefone" juntamente com uma função shortcode para exibir o formulário nas páginas desejadas.


=== Instalação ===

Estando dentro da raiz do WordPress, baixe o plugin para dentro da pasta wp-content através do Git:

git clone https://github.com/felipebuchmann/formulario-rdstation wp-content/plug-ins/plugin-form

Dentro do arquivo "wp-config.php" declare as constantes conforme exemplo abaixo logo após a constante "WP_DEBUG":

define("RD_STATION_IDENTIFICACAO", "identificação"); 
define("RD_STATION_TOKEN", "token"); 
define("RD_STATION_API", "https://www.rdstation.com.br/api/1.2/conversions");