<h1> Leitor de arquivos de ambiente</h1>
<h3>Descrição:</h3>
<p>Essa é uma biblioteca feita em php, cujo o objetivo é carregar os dados sensiveis e disponibiliza-los em outras aplicações
que necessitam dessa camada de abstração.</p>
<hr>
<h2>Arquivos suportados:</h2>
<p>Nessa versão, há suporte para arquivos .env e arquivos .php</p>
<hr>
<h2>Instalação:</h2>
<pre>
<code>
  composer require moises/reader-env-config
</code>

</pre>
<h2>Estrutura de dados sugerida:</h2>
<h3>Arquivos env:</h3>
<pre>
<code>
  texto = string
  numero = 1234
</code>
  
</pre>

<h3>Arquivos php:</h3>
<pre>
<code>
  return [
     'texto' => "string",
     'numero' => 1234
  ]
</code>
</pre>
<p><strong>O arquivo.php precisa obrigatoriamente retornar um array associativo com a chave => valor</strong></p>
<hr>
<h2>Como Usar:</h2>
<h3>Leitura do arquivo de configuração:</h3>
<pre>
  <code>
    ConfigManager::setup(caminho/do/arquivo/de/configurações/env);
  </code>
</pre>
<h3>Uso do valor carregado do arquivo de configuração:</h3>
<pre>
  <code>
    ConfigManager::returnEnviroment('nome_da_chave');
  </code>
</pre>
<hr>

<h2>Demonstração:</h2>

<pre>
  <code>
    ConfigManager::setup(caminho/do/arquivo/de/configurações/env);
    $numero = ConfigManager::returnEnviroment('numero');
    echo $numero;
  </code>
</pre>
<p>Saída:</p>
<pre>
  <code>
    1234
  </code>
</pre>

<h2>Erros personalizados: </h2>
<p>Essa biblioteca possui alguns erros personalizados no formato json:</p>
<pre>
  <code>
    "code": 0,
    "severity": "ERROR",
    "message": "Unsupported file extension: tsx",
    "file": "/caminho/do/arquivo/reader-env-config/src/Arquivo.php",
    "line": 16
  </code>
</pre>
<p>Por padrão esse erro personalizado vem desativado, para ativa-lo, basta registrar o handler:</p>
<pre>
  <code>
    ExceptionHandler::register(); <- tem que vir antes de chamar os metodos da ConfigManager
    ConfigManager::setup(caminho/do/arquivo/de/configurações/env);
    ConfigManager::returnEnviroment('nome_da_chave');
  </code>
</pre>
