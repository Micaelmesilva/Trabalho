<?php

class Livro{
    
    private int $id;
    private string $nome;
    private string $genero;
    private string $editora;
    private string $autor;
    private string $anoLancamento;

    

    /**
     * Get the value of nome
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of genero
     */
    public function getGenero(): string
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     */
    public function setGenero(string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of editora
     */
    public function getEditora(): string
    {
        return $this->editora;
    }

    /**
     * Set the value of editora
     */
    public function setEditora(string $editora): self
    {
        $this->editora = $editora;

        return $this;
    }

    /**
     * Get the value of autor
     */
    public function getAutor(): string
    {
        return $this->autor;
    }

    /**
     * Set the value of autor
     */
    public function setAutor(string $autor): self
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get the value of anoLancamento
     */
    public function getAnoLancamento(): string
    {
        return $this->anoLancamento;
    }

    /**
     * Set the value of anoLancamento
     */
    public function setAnoLancamento(string $anoLancamento): self
    {
        $this->anoLancamento = $anoLancamento;

        return $this;
    }
}
