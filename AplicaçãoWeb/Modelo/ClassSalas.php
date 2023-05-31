<?php
class ClassSalas
{
    private $id;
    private $bloco;
    private $numero;

    function getId()
    {
        return $this->id;
    }

    function getBloco()
    {
        return $this->bloco;
    }

    function getNumero()
    {
        return $this->numero;
    }


    function setId($id)
    {
        $this->id = $id;
    }

    function setBloco($bloco)
    {
        $this->bloco = $bloco;
    }

    function setNumero($numero)
    {
        $this->numero = $numero;
    }
}
