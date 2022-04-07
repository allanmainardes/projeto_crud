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

        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        $id = $_GET['id'];
        if ( !isset( $_POST ) || empty( $_POST ) ) {
	        throw new Exception("Você deve preencher os dados!");
        }else{
            $rulesEmployee = new RulesEmployee();
            $rulesEmployee->validateName($_POST['nomeFunc']);
        }
        
        if(!is_null($id) && $id !== false){
            $aData['idFunc'] = $id;
            $employee = $this->mapperEmployee->updateEmployee($aData);

        }else{
            $employee = $this->mapperEmployee->addEmployee($aData);
        }

        

        header('Location: /list-employees', true, 302);
    }
}

?>