<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;


require_once __DIR__ . '/../vendor/autoload.php';


$entityManagerFactory = new EntityManagerFactory();
$entityManager =  $entityManagerFactory->getEntityManager();


$alunoRepository = $entityManager->getRepository(Aluno::class);

/**@var Aluno[] $alunoList*/
$alunoList=$alunoRepository->findAll();

foreach($alunoList as $aluno){
    $telefones=$aluno
        ->getTelefones()
        ->map(function(Telefone $telefone){
            return $telefone->getNumero();
    })
    ->toArray();

    echo "ID: {$aluno->getId()}\nNome: {$aluno->getNome()}\n";
    echo "Telefones: ". implode (',', $telefones);

    echo"\n\n";

}