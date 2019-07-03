<?php


namespace Alura\Doctrine\Entity;

use mysql_xdevapi\Collection;

/**
 * @Entity
 */
 class Aluno
{
    /**
     * @Id
     *@GeneratedValue
     *@Column(type="integer")
     */
    private $id;
     /**
      * @Column(type="string")
      */
    private $nome;
     /**
      * @OneToMany(targetEntity="Telefone", mappedBy="Telefone")
      */
    private $telefones;
    public function __construct()
    {
        $this->telefones= new Collection();
    }

     public function getId(): int
     {
         return $this->id;
     }

    public function getNome():string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;
        return $this;
    }
    public function addTelefone(Telefone $telefone)
    {
        $this->telefones->add($telefone);
        $telefone->setAluno($this);
        return $this;
    }

    public function getTelefones(): Collection
    {
        return $this->telefones;
    }

}
