<?php

require_once("Livro.php");

class LivroFisico extends Livro {

    // Métodos
    public function getTipo() {
        return "Físico";
    }
}