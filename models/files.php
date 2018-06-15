<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 07/06/2018
 * Time: 20:06
 */

class files
{
    private $id_file, $str_name_file, $str_month, $str_year;

    /**
     * files constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getIdFile()
    {
        return $this->id_file;
    }

    /**
     * @param mixed $id_file
     */
    public function setIdFile($id_file)
    {
        $this->id_file = $id_file;
    }

    /**
     * @return mixed
     */
    public function getStrNameFile()
    {
        return $this->str_name_file;
    }

    /**
     * @param mixed $str_name_file
     */
    public function setStrNameFile($str_name_file)
    {
        $this->str_name_file = $str_name_file;
    }

    /**
     * @return mixed
     */
    public function getStrMonth()
    {
        return $this->str_month;
    }

    /**
     * @param mixed $str_month
     */
    public function setStrMonth($str_month)
    {
        $this->str_month = $str_month;
    }

    /**
     * @return mixed
     */
    public function getStrYear()
    {
        return $this->str_year;
    }

    /**
     * @param mixed $str_year
     */
    public function setStrYear($str_year)
    {
        $this->str_year = $str_year;
    }




}