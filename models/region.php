<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 07/06/2018
 * Time: 20:10
 */

class region
{
    public $id_region, $str_name_region;

    /**
     * region constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getIdRegion()
    {
        return $this->id_region;
    }

    /**
     * @param mixed $id_region
     */
    public function setIdRegion($id_region)
    {
        $this->id_region = $id_region;
    }

    /**
     * @return mixed
     */
    public function getStrNameRegion()
    {
        return $this->str_name_region;
    }

    /**
     * @param mixed $str_name_region
     */
    public function setStrNameRegion($str_name_region)
    {
        $this->str_name_region = $str_name_region;
    }


}