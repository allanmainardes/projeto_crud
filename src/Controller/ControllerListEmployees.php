<?php 

namespace Mainardes\ProjetoCrud\Controller;

use Mainardes\ProjetoCrud\Mapper\MapperEmployee;

class ControllerListEmployees implements InterfaceControllerRequest
{

    private $mapperEmployee;

    public function __construct()
    {
         $this->mapperEmployee = new MapperEmployee();    
    }
    

    public function processRequest() 
    {
        $employees = $this->mapperEmployee->findAllEmployees();
        $titulo = 'Listar Funcionarios';
        $resultados = count($employees);
        // require_once(__DIR__ . "/../View/employees/ListEmployees.php");
        require_once(__DIR__ . "/../View/employees/teste.php");
        
    }
}

?>