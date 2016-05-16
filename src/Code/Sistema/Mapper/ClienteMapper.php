<?php
namespace Code\Sistema\Mapper;

use \Doctrine\ORM\EntityManager;

class ClienteMapper
{
    private $entityManager;
    
    public function __construct( EntityManager $entityManager )
    {
        $this->entityManager = $entityManager;
    }

    public function insert( \Code\Sistema\Entity\Cliente $cliente )
    {
        $this->entityManager->persist( $cliente );
        $this->entityManager->flush();
        
        return [
            'id'    => $cliente->getId(),
            'nome'  => $cliente->getNome(),
            'email' => $cliente->getEmail()
        ];
    }
}
