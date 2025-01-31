CREATE TABLE livros (

    id int AUTO_INCREMENT NOT NULL,
    genero varchar(50) NOT NULL, 
    nome varchar(50) NOT NULL,
    editora varchar(50) NOT NULL,
    autor varchar(50),
    anoLancamento varchar(50),
    PRIMARY KEY(id)
    
)