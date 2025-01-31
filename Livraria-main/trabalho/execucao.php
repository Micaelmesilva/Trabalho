<?php

require_once("modelo/Livro.php");
require_once("DAO/LivroDAO.php");

//Teste da conexão
require_once("util/Conexao.php");
$con = Conexao::getCon();
print_r($con);

do {
    echo "\n----CADASTRO DE LIVROS----\n";
    echo "1- Cadastrar Livro\n";
    echo "2- Listar Livros\n";
    echo "3- Buscar Livro\n";
    echo "4- Excluir Livro\n";
    echo "0- Sair\n";

    $opcao = readline("Informe a opção: ");
    switch ($opcao) {

        case '1':
            system("clear");
            $livro = new Livro();
            $livro->setNome(readline("Informe o nome do livro: "));
            $livro->setGenero(readline("Informe o gênero do livro: "));
            $livro->setEditora(readline("Informe a editora do livro: "));
            $livro->setAutor(readline("Informe o autor do livro: "));
            $livro->setAnoLancamento(readline("Informe o ano de lançamento do livro: "));

            // Criar o objeto a ser persistido
            $livroDAO = new LivroDAO();
            $livroDAO->inserirLivro($livro);

            echo "Livro cadastrado com sucesso! \n\n";
            readline("Clique Enter Para Continuar...");
            system("clear");
            break;

        case '2':
            system("clear");
            // Buscar os objetos no banco de dados
            $livroDAO = new LivroDAO();
            $livros = $livroDAO->listarlivros();

            // Exibir os dados dos objetos
            foreach ($livros as $l) {
                printf(
                    "%d | %s | %s | %s | %s | %s | \n",
                    $l->getId(),
                    $l->getNome(),
                    $l->getGenero(),
                    $l->getEditora(),
                    $l->getAutor(),
                    $l->getAnoLancamento()
                );
            }
            readline("Clique Enter Para Continuar...");
            system("clear");
            break;

        case '3':
            system("clear");
            $id = readline("Informe o ID do livro que deseja buscar: ");
            $livroDAO = new LivroDAO();
            $livro = $livroDAO->buscarlivro($id);

            if ($livro) {
                printf(
                    "Livro encontrado: %d | %s | %s | %s | %s | %s | \n",
                    $livro->getId(),
                    $livro->getNome(),
                    $livro->getGenero(),
                    $livro->getEditora(),
                    $livro->getAutor(),
                    $livro->getAnoLancamento()
                );
            } else {
                echo "Livro não encontrado!\n";
            }
            readline("Clique Enter Para Continuar...");
            system("clear");
            break;

        case '4':
            system("clear");
            // Listar livros para exclusão
            $livroDAO = new LivroDAO();
            $livros = $livroDAO->listarlivros();

            foreach ($livros as $l) {
                printf(
                    "%d | %s | %s | %s | %s | %s | \n",
                    $l->getId(),
                    $l->getNome(),
                    $l->getGenero(),
                    $l->getEditora(),
                    $l->getAutor(),
                    $l->getAnoLancamento()
                );
            }

            // Solicitar ao usuário para informar o ID
            $id = readline("Informe o ID do livro que deseja excluir: ");

            // Chamar o livroDAO para remover da base de dados
            $livroDAO->excluirlivro($id);

            // Informar que o livro foi excluído
            echo "Livro excluído com sucesso! \n";
            readline("Clique Enter Para Continuar...");
            system("clear");
            break;

        case '0':
            echo "Programa encerrado!\n";
            break;

        default:
            system("clear");
            echo "Opção Inválida! Tente novamente.\n";
            readline("Clique Enter Para Continuar...");
            system("clear");
    }
} while ($opcao != 0);
