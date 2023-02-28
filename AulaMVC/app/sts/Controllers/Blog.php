<?php

namespace Sts\Controllers;

class Blog
{
    private array $dados;

    public function index(){
        //echo "Controller/Pagina Blog<br>";
        $listarArtigo = new \Sts\Models\StsListarBlog();
        $this->dados['artigos'] = $listarArtigo->listar();
        //print_r($this->dados);
        $carregarView = new \Core\configView("Sts/Views/blog/listarArtigo", $this->dados);
        $carregarView->renderiza();

    }
}