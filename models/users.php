<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 07/06/2018
 * Time: 20:12
 */

class users
{
    public $id_user, $str_username, $str_password, $str_accessprofile, $str_email;

    /**
     * source constructor.
     */
    public function __construct($id_user, $str_username, $str_password, $str_accessprofile, $str_email)
    {
        $this->id_user = $id_user;
        $this->str_username = $str_username;
        $this->str_password = $str_password;
        $this->str_accessprofile = $str_accessprofile;
        $this->str_email = $str_email;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

     /**
     * @return mixed
     */
    public function getIdEmail()
    {
        return $this->str_email;
    }

    /**
     * @param mixed $str_email
     */
    public function setIdEmail($str_email)
    {
        $this->str_email = $str_email;
    }

    /**
     * @return mixed
     */
    public function getStrUsername()
    {
        return $this->str_username;
    }

    /**
     * @param mixed $str_username
     */
    public function setStrUsername($str_username)
    {
        $this->str_username = $str_username;
    }

    /**
     * @return mixed
     */
    public function getStrPassword()
    {
        return $this->str_password;
    }

    /**
     * @param mixed $str_password
     */
    public function setStrPassword($str_password)
    {
        $this->str_password = $str_password;
    }

    /**
     * @return mixed
     */
    public function getStrAccessprofile()
    {
        return $this->str_accessprofile;
    }

    /**
     * @param mixed $str_accessprofile
     */
    public function setStrAccessprofile($str_accessprofile)
    {
        $this->str_accessprofile = $str_accessprofile;
    }




}