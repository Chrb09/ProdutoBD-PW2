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
    function salvar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("insert into produto values (null,?,?)");
            @$sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getEstoque(), PDO::PARAM_STR);
            if ($sql->execute() == 1) {
                return "Registo salvo com sucesso!";
            }
            $this->conn = null;
        } catch (PDOException $exc) {
            return "Erro ao salvar o registro. <h4>" . $exc->getMessage() . "</h4>";
        }
    }
    function alterar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("update produto set nome = ?, estoque = ? where id = ?");
            @$sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getEstoque(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getId(), PDO::PARAM_STR);
            if ($sql->execute() == 1) {
                return 1;
            }
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao alterar. " . $exc->getMessage();
        }
    }
    function consultar($iescolha)
    {
        try {
            $this->conn = new Conectar();
            switch ($iescolha) {
                case 'Id':
                    $sql = $this->conn->prepare("select * from produto where id like ?");
                    @$sql->bindParam(1, $this->getId(), PDO::PARAM_STR);
                    break;
                case 'Nome':
                    $name = $this->getNome();
                    $name = '%' . $name . '%';
                    $sql = $this->conn->prepare("select * from produto where nome like ?");
                    @$sql->bindParam(1, $name, PDO::PARAM_STR);
                    break;
                case 'Estoque':
                    $estoque = $this->getEstoque();
                    $estoque = $estoque . '%';
                    $sql = $this->conn->prepare("select * from produto where estoque like ?");
                    @$sql->bindParam(1, $estoque, PDO::PARAM_STR);
                    break;
            }


            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta. " . $exc->getMessage();
        }
    }
    function exclusao()
    {
        $this->conn = new Conectar();
        $sql = $this->conn->prepare("delete from produto where id = ?");
        @$sql->bindParam(1, $this->getId(), PDO::PARAM_STR);
        if ($sql->execute() == 1) {
            return "Excluido com sucesso!";
        } else {
            return "Erro na exclusão!";
        }
    }
    function listar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->query("select * from produto order by id");
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta. " . $exc->getMessage();
        }
    }
} // encerramento de classe Produto

?>