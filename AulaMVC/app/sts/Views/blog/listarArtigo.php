<?php

//echo "View - listar artigos para usuário";

foreach ($this->dados['artigos'] as $artigo) {
    extract($artigo);
    echo "ID: $id <br>";
    echo "ID: $titulo <br>";
    echo "ID: $conteudo <br>";
    echo "<hr>";
}
