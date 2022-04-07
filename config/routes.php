<?php 

use Mainardes\ProjetoCrud\Controller\ControllerListEmployees;
use Mainardes\ProjetoCrud\Controller\ControllerRemoveEmployee;
use Mainardes\ProjetoCrud\Controller\ControllerSaveEmployee;

return [
    '' => ControllerListEmployees::class,
    '/list-employees' => ControllerListEmployees::class,
    '/save-employee' => ControllerSaveEmployee::class,
    '/remove-employee' => ControllerRemoveEmployee::class,
];

?>
