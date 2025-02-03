<?php

require_once("modelo/Livro.php");
require_once("modelo/LivroFisico.php");
require_once("modelo/LivroDigital.php");
require_once("DAO/LivroDAO.php");

do {
    echo "\n----CADASTRO DE LIVROS----\n";
    echo "1- Cadastrar Livro Físico\n";
    echo "2- Cadastrar Livro Digital\n";
    echo "3- Listar Livros\n";
    echo "4- Buscar Livro\n";
    echo "5- Excluir Livro\n";
    echo "0- Sair\n";

    $opcao = readline("Informe a opção: ");
    switch ($opcao) {

        case '1':
            system('clear');
            $livro = new LivroFisico();
            $livro->setTitulo(readline("Informe o título: "));
            $livro->setAutor(readline("Informe o autor: "));
            $livro->setEditora(readline("Informe a editora: "));
            $livro->setAnoPublicacao((int)readline("Informe o ano de publicação: "));
            $livro->setNumeroPaginas((int)readline("Informe o número de páginas: "));

            $livroDAO = new LivroDAO();
            $livroDAO->inserirLivro($livro);
            
            echo "Livro Físico cadastrado com sucesso! \n\n";
            readline("Clique Enter Para Continuar...");
            system('clear');
            break;

        case '2':
            system('clear');
            $livro = new LivroDigital();
            $livro->setTitulo(readline("Informe o título: "));
            $livro->setAutor(readline("Informe o autor: "));
            $livro->setEditora(readline("Informe a editora: "));
            $livro->setAnoPublicacao((int)readline("Informe o ano de publicação: "));
            $livro->setNumeroPaginas((int)readline("Informe o número de páginas: "));

            $livroDAO = new LivroDAO();
            $livroDAO->inserirLivro($livro);
            
            echo "Livro Digital cadastrado com sucesso! \n\n";
            readline("Clique Enter Para Continuar...");
            system('clear');
            break;

        case '3':
            system('clear');
            $livroDAO = new LivroDAO();
            $livros = $livroDAO->listarLivros();

            foreach ($livros as $l) {
                printf(
                    "%d | %s | %s | %s | %d | %s | %d | \n",
                    $l->getId(),
                    $l->getTipo(),
                    $l->getTitulo(),
                    $l->getAutor(),
                    $l->getAnoPublicacao(),
                    $l->getNumeroPaginas()
                );
            }
            readline("Clique Enter Para Continuar...");
            system('clear');
            break;

        case '4':
            system('clear');
            $id = readline("Informe o ID do livro que deseja buscar: ");
            $livroDAO = new LivroDAO();
            $livro = $livroDAO->buscarLivro($id);

            if ($livro) {
                printf(
                    "Livro encontrado: %d | %s | %s | %s | %d | %s | %d | \n",
                    $livro->getId(),
                    $livro->getTipo(),
                    $livro->getTitulo(),
                    $livro->getAutor(),
                    $livro->getAnoPublicacao(),
                    $livro->getNumeroPaginas()
                );
            } else {
                echo "Livro não encontrado!\n";
            }
            readline("\nClique Enter Para Continuar...");
            system('clear');
            break;

        case '5':
            system('clear');
            $livroDAO = new LivroDAO();
            $livros = $livroDAO->listarLivros();

            $indice = 1;
            print("------------------------\n");
            foreach ($livros as $l) {
                print("Indice: " . $indice . "\n");
                $indice++;
                printf(
                    "%d | %s | %s | %s | %d | %s | %d | \n",
                    $l->getId(),
                    $l->getTipo(),
                    $l->getTitulo(),
                    $l->getAutor(),
                    $l->getAnoPublicacao(),
                    $l->getNumeroPaginas()
                );
                print("\n------------------------\n");
            }

            $id = readline("Informe o Id do Livro: ");
            $livroDAO->excluirLivro($id);
            system('clear');
            break;

        case '0':
            system('clear');
            readline("Saindo...\n");
            break;

        default:
            echo "Opção Inválida!\n";
    }
} while ($opcao != 0);