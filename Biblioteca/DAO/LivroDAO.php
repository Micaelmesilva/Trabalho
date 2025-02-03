<?php

require_once("modelo/Livro.php");
require_once("modelo/LivroFisico.php");
require_once("modelo/LivroDigital.php");
require_once("util/Conexao.php");

class LivroDAO {

    public function inserirLivro(Livro $livro) {
        $sql = "INSERT INTO livros (tipo, titulo, autor, editora, ano_publicacao, numero_paginas)
                VALUES(?, ?, ?, ?, ?, ?, ?)";
    
        $con = Conexao::getCon();
        $stm = $con->prepare($sql);
    
        $stm->execute(array(
            $livro->getTipo(),
            $livro->getTitulo(),
            $livro->getAutor(),
            $livro->getEditora(),
            $livro->getAnoPublicacao(),
            $livro->getNumeroPaginas()
        ));
    }

    public function listarLivros() {
        $sql = "SELECT * FROM livros";
        $con = Conexao::getCon();
        $stm = $con->prepare($sql);
        $stm->execute();
        $registros = $stm->fetchAll();
        return $this->mapLivros($registros);
    }

    private function mapLivros(array $registros) {
        $livros = array();

        foreach ($registros as $reg) {
            $livro = null;

            if ($reg['tipo'] == 'Físico') {
                $livro = new LivroFisico();
            } else {
                $livro = new LivroDigital();
            }

            $livro->setId($reg['id']);
            $livro->setTitulo($reg['titulo']);
            $livro->setAutor($reg['autor']);
            $livro->setEditora($reg['editora']);
            $livro->setAnoPublicacao($reg['ano_publicacao']);
            $livro->setNumeroPaginas($reg['numero_paginas']);
            array_push($livros, $livro);
        }
        return $livros;
    }

    public function buscarLivro(int $id) {
        $sql = "SELECT * FROM livros WHERE id = ?";
        $con = Conexao::getCon();
        $stm = $con->prepare($sql);
        $stm->execute([$id]);
        $registro = $stm->fetch();

        if ($registro) {
            return $this->mapLivros([$registro])[0];
        }
        return null;
    }

    public function excluirLivro($id) {
        $sql = "DELETE FROM livros WHERE id = ?";
        $con = Conexao::getCon();
        $stm = $con->prepare($sql);
        $stm->execute([$id]);
    }
}