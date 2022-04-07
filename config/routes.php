<?php 

use Mainardes\ProjetoCrud\Controller\ControllerAddEmployee;
use Mainardes\ProjetoCrud\Controller\ControllerUpdateEmployee;
use Mainardes\ProjetoCrud\Controller\ControllerListEmployees;
use Mainardes\ProjetoCrud\Controller\ControllerRemoveEmployee;
use Mainardes\ProjetoCrud\Controller\ControllerSaveEmployee;

return [
    '' => ControllerListEmployees::class,
    '/list-employees' => ControllerListEmployees::class,
    '/add-employee' => ControllerAddEmployee::class,
    '/save-employee' => ControllerSaveEmployee::class,
    '/update-employee' => ControllerUpdateEmployee::class,
    '/remove-employee' => ControllerRemoveEmployee::class,
];




?>
