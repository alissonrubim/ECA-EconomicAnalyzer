<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 07/06/2018
 * Time: 20:13
 */

class state
{
    public $id_state, $str_uf, $str_name, $tb_region_id_region;

    /**
     * state constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getIdState()
    {
        return $this->id_state;
    }

    /**
     * @param mixed $id_state
     */
    public function setIdState($id_state)
    {
        $this->id_state = $id_state;
    }

    /**
     * @return mixed
     */
    public function getStrUf()
    {
        return $this->str_uf;
    }

    /**
     * @param mixed $str_uf
     */
    public function setStrUf($str_uf)
    {
        $this->str_uf = $str_uf;
    }

    /**
     * @return mixed
     */
    public function getStrName()
    {
        return $this->str_name;
    }

    /**
     * @param mixed $str_name
     */
    public function setStrName($str_name)
    {
        $this->str_name = $str_name;
    }

    /**
     * @return mixed
     */
    public function getTbRegionIdRegion()
    {
        return $this->tb_region_id_region;
    }

    /**
     * @param mixed $tb_region_id_region
     */
    public function setTbRegionIdRegion($tb_region_id_region)
    {
        $this->tb_region_id_region = $tb_region_id_region;
    }




}