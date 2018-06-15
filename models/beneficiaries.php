<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 07/06/2018
 * Time: 20:04
 */

class beneficiaries
{
    public $id_beneficiaries, $str_nis, $str_name_person;

    /**
     * beneficiaries constructor.
     */
    public function __construct($a, $b, $c)
    {
        $this->id_beneficiaries = $a;
        $this->str_nis = $b;
        $this->str_name_person = $c;
    }

    /**
     * @return mixed
     */
    public function getIdBeneficiaries()
    {
        return $this->id_beneficiaries;
    }

    /**
     * @param mixed $id_beneficiaries
     */
    public function setIdBeneficiaries($id_beneficiaries)
    {
        $this->id_beneficiaries = $id_beneficiaries;
    }

    /**
     * @return mixed
     */
    public function getStrNis()
    {
        return $this->str_nis;
    }

    /**
     * @param mixed $str_nis
     */
    public function setStrNis($str_nis)
    {
        $this->str_nis = $str_nis;
    }

    /**
     * @return mixed
     */
    public function getStrNamePerson()
    {
        return $this->str_name_person;
    }

    /**
     * @param mixed $str_name_person
     */
    public function setStrNamePerson($str_name_person)
    {
        $this->str_name_person = $str_name_person;
    }




}