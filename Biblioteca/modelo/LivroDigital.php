<?php

require_once("Livro.php");

class LivroDigital extends Livro {

    // Métodos
    public function getTipo() {
        return "Digital";
    }
}