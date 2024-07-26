<?php

include_once 'conectar.php';

// parte 1 - atributos
class Produto
{
    private $id;
    private $nome;
    private $estoque;
    private $conn;

    // parte 2 - os getters e setters

    public function getId()
    {
        return $this->id;
    }

    public function setId($iid)
    {
        $this->id = $iid;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($inome)
    {
        $this->nome = $inome;
    }

    public function getEstoque()
    {
        return $this->estoque;
    }

    public function setEstoque($iestoque)
    {
        $this->estoque = $iestoque;
    }
    // parte 3 - métodos

    function listar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->query("select * from produto order by nome");
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta. " . $exc->getMessage();
        }
    }
} // encerramento de classe Produto

?>