<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 07/06/2018
 * Time: 20:06
 */

class functions
{
    private $id_function, $str_cod_function, $str_name_function;

    /**
     * functions constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getIdFunction()
    {
        return $this->id_function;
    }

    /**
     * @param mixed $id_function
     */
    public function setIdFunction($id_function)
    {
        $this->id_function = $id_function;
    }

    /**
     * @return mixed
     */
    public function getStrCodFunction()
    {
        return $this->str_cod_function;
    }

    /**
     * @param mixed $str_cod_function
     */
    public function setStrCodFunction($str_cod_function)
    {
        $this->str_cod_function = $str_cod_function;
    }

    /**
     * @return mixed
     */
    public function getStrNameFunction()
    {
        return $this->str_name_function;
    }

    /**
     * @param mixed $str_name_function
     */
    public function setStrNameFunction($str_name_function)
    {
        $this->str_name_function = $str_name_function;
    }




}