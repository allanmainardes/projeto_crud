<?php 

namespace Mainardes\ProjetoCrud\Controller;

use Exception;
use Mainardes\ProjetoCrud\Mapper\MapperEmployee;

class ControllerRemoveEmployee implements InterfaceControllerRequest
{
    private $mapperEmployee;

    public function __construct()
    {
         $this->mapperEmployee = new MapperEmployee();    
    }

    public function processRequest()
    {   
        $id = $_GET['id'];

        if(is_null($id) && $id === false){
            throw new Exception("Funcionário Inválido!");
        }else{
            $this->mapperEmployee->removeEmployee($id);
        }
        

        header('Location: /list-employees?rm=success', true, 302);
    }
}

?>