<?php 

namespace Mainardes\ProjetoCrud\Rules;
require_once 'is_email.php';
use Exception;

class RulesEmployee
{   
    public function validateData($aData){
        if($this->validateName($aData['nomeFunc']) ||
        $this->validateCpf($aData['cpfFunc']) ||
        $this->validateEmail($aData['emailFunc']) ||
        $this->validateData($aData['dtNascimentoFunc'])){
            return true;
        } else{
            return false;
        }
    }

    public function validateName($employeeName, $maxCharacter = 100):bool
    {
        if(!is_null($employeeName) 
            || is_string($employeeName) 
            || mb_strlen($employeeName <= $maxCharacter)
            || !empty($employeeName))
        {
            return true;
        }else{
            return false;
        }
    }

    public function validateCpf($employeeCpf = null):bool
    {
        // Verifica se um número foi informado
        if (empty($employeeCpf)) 
        {
            return false;
        }
        // Elimina possivel mascara
        $employeeCpfOnlyNumbers = preg_replace("/[^0-9]/", "", $employeeCpf);

        // Verifica se o numero de digitos informados é igual a 11
        if (strlen($employeeCpfOnlyNumbers) != 11) 
        {
            return false;
        } 
        // Verifica se nenhuma das sequências invalidas abaixo
        // foi digitada. Caso afirmativo, retorna falso
        else if ($employeeCpfOnlyNumbers == '00000000000' 
            || $employeeCpfOnlyNumbers == '11111111111' 
            || $employeeCpfOnlyNumbers == '22222222222' 
            || $employeeCpfOnlyNumbers == '33333333333' 
            || $employeeCpfOnlyNumbers == '44444444444' 
            || $employeeCpfOnlyNumbers == '55555555555' 
            || $employeeCpfOnlyNumbers == '66666666666' 
            || $employeeCpfOnlyNumbers == '77777777777' 
            || $employeeCpfOnlyNumbers == '88888888888' 
            || $employeeCpfOnlyNumbers == '99999999999') 
            {
            return false;
            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
        } 
        return true;
    }

    public function validateEmail($employeeEmail = null):bool
    {
        if(is_email($employeeEmail)){
            return true;
        }else{
            return false;
        }
    }

    public function validateDate($employeeBirthday = null):bool
    {
        if(preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $employeeBirthday)){
            return true;
        }else{
            return false;
        }
    }
}

?>