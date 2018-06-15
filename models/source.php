<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 07/06/2018
 * Time: 20:12
 */

class source
{
    public $id_source, $str_goal, $str_origin, $str_periodicity;

    /**
     * source constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getIdSource()
    {
        return $this->id_source;
    }

    /**
     * @param mixed $id_source
     */
    public function setIdSource($id_source)
    {
        $this->id_source = $id_source;
    }

    /**
     * @return mixed
     */
    public function getStrGoal()
    {
        return $this->str_goal;
    }

    /**
     * @param mixed $str_goal
     */
    public function setStrGoal($str_goal)
    {
        $this->str_goal = $str_goal;
    }

    /**
     * @return mixed
     */
    public function getStrOrigin()
    {
        return $this->str_origin;
    }

    /**
     * @param mixed $str_origin
     */
    public function setStrOrigin($str_origin)
    {
        $this->str_origin = $str_origin;
    }

    /**
     * @return mixed
     */
    public function getStrPeriodicity()
    {
        return $this->str_periodicity;
    }

    /**
     * @param mixed $str_periodicity
     */
    public function setStrPeriodicity($str_periodicity)
    {
        $this->str_periodicity = $str_periodicity;
    }




}