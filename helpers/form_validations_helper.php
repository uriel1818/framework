<?php
/**
 * Esta clase se encarga de validar los formularios, que no tengan espacios en blancos,
 * que los campos requeridos estén completos, etc.
 * Cada validacion posible es una funcion.
 * Se debe cargar el array $validations con el nombre de las funciones (validaciones) que tenga que cumplir cada "input"
 */
namespace app\helpers;

class form_validations_helper
{
    private $errors;
    public $validations;
   
    public function setValidation($input, $validations = array('required'))
    {
        $this->validations[$input] = $validations;
    }
    public function addError($input, $error)
    {
            $this->errors[$input][] = $error;
    }

    /** VALIDACIONES */
    public function required($input)
    {
        if (empty($_POST[$input])) {
            $this->addError($input, 'El campo ' . strtoupper($input) . ' es obligatorio, completalo chinwenwencha');
        }
    }
    public function hasWhiteSpaces($input)
    {
        if (strpos($_POST[$input], ' ') !== FALSE) {
            $this->addError($input, 'No se puede agregar espacios en blanco en ' . strtoupper($input));
        }
    }
    /** FIN VALIDACIONES */

    public function validate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            foreach ($this->validations as $input => $validation) {
                if (!in_array('required', $validation) and empty($_POST[$input])) {
                    exit;
                } else {
                    foreach ($validation as $foo) {
                        $this->$foo($input);
                    }
                }
            }
        } else {
            $this->errors['method'] = $_SERVER['REQUEST_METHOD'];
        }

        return $this->errors;
    }
}
