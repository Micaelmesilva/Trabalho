<?php

require_once("modelo/Livro.php");
require_once("util/Conexao.php");

class LivroDAO
{
    public function inserirLivro(Livro $livro)
    {
        $sql = "INSERT INTO livros (nome, genero, editora, autor, anoLancamento) VALUES(?, ?, ?, ?, ?)";
        $con = Conexao::getCon();
        $stm = $con->prepare($sql);
        
        try {
            $stm->execute([
                $livro->getNome(),
                $livro->getGenero(),
                $livro->getEditora(),
                $livro->getAutor(),
                $livro->getAnoLancamento()
            ]);
        } catch (PDOException $e) {
            throw new Exception("Erro ao inserir livro: " . $e->getMessage());
        }
    }

    public function listarlivros()
    {
        $sql = "SELECT * FROM livros";
        $con = Conexao::getCon();
        $stm = $con->prepare($sql);
        
        try {
            $stm->execute();
            $registros = $stm->fetchAll();
            return $this->maplivros($registros);
        } catch (PDOException $e) {
            throw new Exception("Erro ao listar livros: " . $e->getMessage());
        }
    }

    private function maplivros(array $registros)
    {
        $livros = array();

        foreach ($registros as $reg) {
            $livro = new Livro();
            $livro->setId($reg['id']);
            $livro->setNome($reg['nome']);
            $livro->setEditora($reg['editora']);
            $livro->setAnoLancamento($reg['anoLancamento']);
            $livro->setAutor($reg['autor']);
            $livro->setGenero($reg['genero']);
            array_push($livros, $livro);
        }
        return $livros;
    }

    public function buscarlivro(int $id)
    {
        $sql = "SELECT * FROM livros WHERE id = ?";
        $con = Conexao::getCon();
        $stm = $con->prepare($sql);
        
        try {
            $stm->execute([$id]);
            $registro = $stm->fetch();
            return $registro ? $this->maplivros([$registro])[0] : null;
        } catch (PDOException $e) {
            throw new Exception("Erro ao buscar livro: " . $e->getMessage());
        }
    }

    public function excluirlivro(int $id)
    {
        $sql = "DELETE FROM livros WHERE id = ?";
        $con = Conexao::getCon();
        $stm = $con->prepare($sql);
        
        try {
            $stm->execute([$id]);
        } catch (PDOException $e) {
            throw new Exception("Erro ao excluir livro: " . $e->getMessage());
        }
    }
}