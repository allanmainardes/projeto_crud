<?php 

namespace Mainardes\ProjetoCrud\Controller;

use Mainardes\ProjetoCrud\Mapper\MapperEmployee;

class ControllerUpdateEmployee implements InterfaceControllerRequest
{

    private $mapperEmployee;

    public function __construct()
    {
         $this->mapperEmployee = new MapperEmployee();    
    }

    public function processRequest() 
    {

        $id = $_GET['id'];

        $employee = $this->mapperEmployee->findEmployeeById($id);
        
        require_once(__DIR__ . "/../View/employees/FormSaveEmployee.php");
        
    }
}

?>