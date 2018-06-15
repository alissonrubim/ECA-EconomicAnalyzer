<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 07/06/2018
 * Time: 20:05
 */

class city
{
    private $id_city, $str_name_city, $str_cod_siafi_city, $tb_state_id_state;

    /**
     * city constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getIdCity()
    {
        return $this->id_city;
    }

    /**
     * @param mixed $id_city
     */
    public function setIdCity($id_city)
    {
        $this->id_city = $id_city;
    }

    /**
     * @return mixed
     */
    public function getStrNameCity()
    {
        return $this->str_name_city;
    }

    /**
     * @param mixed $str_name_city
     */
    public function setStrNameCity($str_name_city)
    {
        $this->str_name_city = $str_name_city;
    }

    /**
     * @return mixed
     */
    public function getStrCodSiafiCity()
    {
        return $this->str_cod_siafi_city;
    }

    /**
     * @param mixed $str_cod_siafi_city
     */
    public function setStrCodSiafiCity($str_cod_siafi_city)
    {
        $this->str_cod_siafi_city = $str_cod_siafi_city;
    }

    /**
     * @return mixed
     */
    public function getTbStateIdState()
    {
        return $this->tb_state_id_state;
    }

    /**
     * @param mixed $tb_state_id_state
     */
    public function setTbStateIdState($tb_state_id_state)
    {
        $this->tb_state_id_state = $tb_state_id_state;
    }




}