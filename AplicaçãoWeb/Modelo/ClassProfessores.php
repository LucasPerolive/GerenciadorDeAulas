<?php
class ClassProfessores
{
    private $id;
    private $nome;
    private $email;
    private $matricula;
    private $CPF;
    private $formacao;


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

    function getMatricula()
    {
        return $this->matricula;
    }

    function getCPF()
    {
        return $this->CPF;
    }

    function getFormacao()
    {
        return $this->formacao;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setNome($nome)
    {
        $this->nome = $nome;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }
    
    function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }

    function setCPF($CPF)
    {
        $this->CPF = $CPF;
    }

    function setFormacao($formacao)
    {
        $this->formacao = $formacao;
    }
}
