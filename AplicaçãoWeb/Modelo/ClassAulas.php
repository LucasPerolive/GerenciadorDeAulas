<?php
class ClassAulas
{
    private $id;
    private $id_professor;
    private $id_materia;
    private $id_sala;
    private $hora_comeco;
    private $hora_fim;
    private $data;

    function getId()
    {
        return $this->id;
    }

    function getIdProfessor()
    {
        return $this->id_professor;
    }

    function getIdMateria()
    {
        return $this->id_materia;
    }

    function getIdSala()
    {
        return $this->id_sala;
    }

    function getHoraComeco()
    {
        return $this->hora_comeco;
    }

    function getHoraFim()
    {
        return $this->hora_fim;
    }

    function getData()
    {
        return $this->data;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setIdProfessor($id_professor)
    {
        $this->id_professor = $id_professor;
    }

    function setIdSala($id_sala)
    {
        $this->id_sala = $id_sala;
    }

    function setIdMateria($id_materia)
    {
        $this->id_materia = $id_materia;
    }

    function setHoraComeco($hora_comeco)
    {
        $this->hora_comeco = $hora_comeco;
    }

    function setHoraFim($hora_fim)
    {
        $this->hora_fim = $hora_fim;
    }

    function setData($data)
    {
        $this->data = $data;
    }
}
