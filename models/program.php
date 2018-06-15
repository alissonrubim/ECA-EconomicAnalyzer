<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 07/06/2018
 * Time: 20:09
 */

class program
{
    private $id_program, $str_cod_program, $str_name_program;

    /**
     * program constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getIdProgram()
    {
        return $this->id_program;
    }

    /**
     * @param mixed $id_program
     */
    public function setIdProgram($id_program)
    {
        $this->id_program = $id_program;
    }

    /**
     * @return mixed
     */
    public function getStrCodProgram()
    {
        return $this->str_cod_program;
    }

    /**
     * @param mixed $str_cod_program
     */
    public function setStrCodProgram($str_cod_program)
    {
        $this->str_cod_program = $str_cod_program;
    }

    /**
     * @return mixed
     */
    public function getStrNameProgram()
    {
        return $this->str_name_program;
    }

    /**
     * @param mixed $str_name_program
     */
    public function setStrNameProgram($str_name_program)
    {
        $this->str_name_program = $str_name_program;
    }




}