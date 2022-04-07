<?php 

namespace Mainardes\ProjetoCrud\Controller;

use Exception;
use Mainardes\ProjetoCrud\Mapper\MapperEmployee;
use Mainardes\ProjetoCrud\Rules\RulesEmployee;

class ControllerSaveEmployee implements InterfaceControllerRequest
{
    private $mapperEmployee;

    public function __construct()
    {
         $this->mapperEmployee = new MapperEmployee();    
    }

    public function processRequest()
    {   
        $aData = [
            'nomeFunc' => trim(strip_tags($_POST['nomeFunc'])),
            'cpfFunc' => trim(strip_tags($_POST['cpfFunc'])),
            'emailFunc' => trim(strip_tags($_POST['emailFunc'])),
            'estadoCivilFunc' => trim(strip_tags($_POST['estadoCivilFunc'])),
            'dtNascimentoFunc' => trim(strip_tags($_POST['dtNascimentoFunc'])),
        ];

        $id = $_POST['idFunc'];
        if ( !isset( $_POST ) || empty( $_POST ) ) 
        {
	        throw new Exception("Dados incompletos!");
        }else
        {
            $rulesEmployee = new RulesEmployee();
            if(!$rulesEmployee->validateData($aData)){
                throw new Exception("Dados inválidos!");
            }
        }
        
        if(!is_null($id) && $id !== false && $id !== "")
        {
            $aData['idFunc'] = $id;
            $this->mapperEmployee->updateEmployee($aData);

        }else
        {
            $this->mapperEmployee->addEmployee($aData);
        }

        

        header('Location: /', true, 302);
    }
}

?>