<?php
/**
 * Created by PhpStorm.
 * User: wap60
 * Date: 09/07/15
 * Time: 15:05
 */

namespace TroisWA\Shop\Model;


class User {
    private $id;
    private $mail;
    private $password;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $this->password = $password;
    }

}