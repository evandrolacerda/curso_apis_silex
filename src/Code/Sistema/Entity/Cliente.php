<?php
namespace Code\Sistema\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity;
 * @ORM\Table(name="tb_cliente")
 */
class Cliente
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column( name="cli_id", type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(name="cli_nome", type="string", length=100)
     */
    private $nome;
    
    /**
     * @ORM\Column(name="cli_email", type="string", length=100)
     */
    private $email;
    
    function getId()
    {
        return $this->id;
    }

    function getNome()
    {
        return $this->nome;
    }

    function getEmail()
    {
        return $this->email;
    }

    function setNome($nome)
    {
        $this->nome = $nome;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }


    
}
