<?php 

namespace Mainardes\ProjetoCrud\Controller;


class ControllerAddEmployee implements InterfaceControllerRequest
{
    public function processRequest()
    {
        require_once(__DIR__ . "/../View/employees/FormSaveEmployee.php");
    }


}