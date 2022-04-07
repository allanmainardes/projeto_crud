<?php 

namespace Mainardes\ProjetoCrud\Rules;

use Exception;

class RulesEmployee
{   

    public function validateName($employeeName, $maxCharacter = 100)
    {
        if(!is_null($employeeName) 
            || is_string($employeeName) 
            || mb_strlen($employeeName <= $maxCharacter)
            || !empty($employeeName))
        {
            return true;
        }else{
            throw new Exception("Erro no preenchimento do nome!");
        }
    }

    public function validateCpf($cpfInformado = null):bool
    {
        // Verifica se um número foi informado
        if (empty($cpfInformado)) {
            return false;
        }
        // Elimina possivel mascara
        $cpfInformadoOnlyNumbers = preg_replace("/[^0-9]/", "", $cpfInformado);

        $cpf = $cpfInformadoOnlyNumbers;

        // Verifica se o numero de digitos informados é igual a 11
        if (strlen($cpf) != 11) {
            return false;
        } 
        // Verifica se nenhuma das sequências invalidas abaixo
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cpf == '00000000000' 
            || $cpf == '11111111111' 
            || $cpf == '22222222222' 
            || $cpf == '33333333333' 
            || $cpf == '44444444444' 
            || $cpf == '55555555555' 
            || $cpf == '66666666666' 
            || $cpf == '77777777777' 
            || $cpf == '88888888888' 
            || $cpf == '99999999999') {
            return false;
            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
        } else {
            $dv = []; //para armazenar os DVs
            $cpfSemDigitos = substr($cpf, 0,9);
            for ($t = 9; $t < 11; $t ++) {

                for ($d = 0, $c = 0; $c < $t; $c ++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                $dv[] = $d;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }
            $cpfComDigitosCalculados = $cpfSemDigitos.$dv[0].$dv[1];

            $isOkDv1 = $dv[0] == $cpf[9]; //primeira posição do DV
            $isOkDv2 = $dv[1] == $cpf[10]; //segunda posição do DV
            $isOkSemDigitos = $cpfComDigitosCalculados === $cpfInformadoOnlyNumbers;

            return ($isOkDv1 && $isOkDv2 && $isOkSemDigitos);
        }
    }

}

?>