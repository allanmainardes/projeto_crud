<?php 

namespace Mainardes\ProjetoCrud\Mapper;

use Exception;
use Mainardes\ProjetoCrud\Model\Connection;
use PDO;

class MapperEmployee
{   
    private $conn;

    private $id;

    private $nomeFunc;

    private $cpfFunc;

    private $emailFunc;

    private $estadoCivilFunc;

    private $dtNascimentoFunc;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNomeFunc()
    {
        return $this->nomeFunc;
    }

    public function setNomeFunc($nomeFunc)
    {
        $this->nomeFunc = $nomeFunc;
    }

    public function getCpfFunc()
    {
        return $this->cpfFunc;
    }

    public function setCpfFunc($cpfFunc)
    {
        $this->cpfFunc = $cpfFunc;
    }

    public function getEmailFunc()
    {
        return $this->emailFunc;
    }

    public function setEmailFunc($emailFunc)
    {
        $this->emailFunc = $emailFunc;
    }

    public function getEstadoCivilFunc()
    {
        return $this->estadoCivilFunc;
    }

    public function setEstadoCivilFunc($estadoCivilFunc)
    {
        $this->estadoCivilFunc = $estadoCivilFunc;
    }

    public function getDtNascimentoFunc()
    {
        return $this->dtNascimentoFunc;
    }

    public function setDtNascimentoFunc($dtNascimentoFunc)
    {
        $this->dtNascimentoFunc = $dtNascimentoFunc;
    }

    public function __construct()
    {
        $connection = new Connection();
        $this->conn = $connection->getInstance();
    }

    public function findEmployeeById($idUser)
    {
        
        $stmt = $this->conn->prepare("SELECT * FROM tb_funcionarios WHERE id_func=:id_func");
        $stmt->bindParam("id_func", $idUser);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findAllEmployees()
    {
        $stmt = $this->conn->prepare("SELECT * FROM tb_funcionarios");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addEmployee($aData)
    {   
        $this->conn->beginTransaction();
        $stmt = $this->conn->prepare("
        INSERT INTO tb_funcionarios(nome_func, cpf_func, email_func, estado_civil_func, dt_nascimento_func) 
        VALUES (:func_nome, :func_cpf, :func_email, :func_estado_civil, :func_dt_nascimento)");
        $stmt->bindParam("func_nome" ,$aData['nomeFunc']);
        $stmt->bindParam("func_cpf" ,$aData['cpfFunc']);
        $stmt->bindParam("func_email" ,$aData['emailFunc']);
        $stmt->bindParam("func_estado_civil" ,$aData['estadoCivilFunc']);
        $stmt->bindParam("func_dt_nascimento" ,$aData['dtNascimentoFunc']);
        if($stmt->execute()){
            $this->conn->commit();    
        }else{
            throw new Exception("Erro na inserção, " . $stmt->errorInfo());
            $this->conn->rollBack();
        }
    }

    public function updateEmployee($aData)
    {

        $this->conn->beginTransaction();
        $stmt = $this->conn->prepare("
        UPDATE tb_funcionarios SET nome_func = :func_nome, cpf_func = :func_cpf, email_func = :func_email, 
        estado_civil_func = :func_estado_civil, dt_nascimento_func = :func_dt_nascimento WHERE id_func = :func_id ");
        $stmt->bindParam("func_id", $aData['idFunc'], PDO::PARAM_INT);
        $stmt->bindParam("func_nome", $aData['nomeFunc']);
        $stmt->bindParam("func_cpf", $aData['cpfFunc']);
        $stmt->bindParam("func_email", $aData['emailFunc']);
        $stmt->bindParam("func_estado_civil", $aData['estadoCivilFunc']);
        $stmt->bindParam("func_dt_nascimento", $aData['dtNascimentoFunc']);
        if($stmt->execute()){
            $this->conn->commit();    
        }else{
            throw new Exception("Erro na alteração, " . $stmt->errorInfo());
            $this->conn->rollBack();
        }

    }

    public function removeEmployee($id){
        $this->conn->beginTransaction();
        $stmt = $this->conn->prepare("DELETE FROM tb_funcionarios WHERE id_func = :func_id");
        $stmt->bindParam("func_id", $id, PDO::PARAM_INT);
        if($stmt->execute()){
            $this->conn->commit();    
        }else{
            throw new Exception("Erro na exclusão, " . $stmt->errorInfo());
            $this->conn->rollBack();
        }
    }

}

?>