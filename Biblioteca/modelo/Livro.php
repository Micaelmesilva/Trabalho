<?php 

abstract class Livro {

    // Atributos
    protected int $id;
    protected string $titulo;
    protected string $autor;
    protected string $editora;
    protected int $anoPublicacao;
    protected int $numeroPaginas;

    // Métodos
    public abstract function getTipo();

    // GETs e SETs
    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }

    public function getTitulo(): string {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self {
        $this->titulo = $titulo;
        return $this;
    }

    public function getAutor(): string {
        return $this->autor;
    }

    public function setAutor(string $autor): self {
        $this->autor = $autor;
        return $this;
    }

    public function getEditora(): string {
        return $this->editora;
    }

    public function setEditora(string $editora): self {
        $this->editora = $editora;
        return $this;
    }

    public function getAnoPublicacao(): int {
        return $this->anoPublicacao;
    }

    public function setAnoPublicacao(int $anoPublicacao): self {
        $this->anoPublicacao = $anoPublicacao;
        return $this;
    }

    public function getNumeroPaginas(): int {
        return $this->numeroPaginas;
    }

    public function setNumeroPaginas(int $numeroPaginas): self {
        $this->numeroPaginas = $numeroPaginas;
        return $this;
    }
}