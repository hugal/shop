<?php
/**
 * Created by PhpStorm.
 * User: wap60
 * Date: 09/07/15
 * Time: 15:11
 */

namespace TroisWA\Shop\Controller;

use TroisWA\Shop\Model\User;


class UserController extends AbstractController{

    private $errors = [];

    public function signupFormAction(){

        return $this->view->render("user/signup_form.twig",
            [ "categories" => $this->getCategories()]);
    }


    public function signupAction(){

        $mail = $this->request->post('email');
        $password = $this->request->post('password');
        $password_confirm = $this->request->post('password_confirm');
        if (empty($mail) || empty($password) || empty($password_confirm)) {
            $this->errors[] = "one or more empty field(s)";
        }

        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "mail is invalid";
        }


        if ($password !== $password_confirm) {
            $this->errors[] = "passwords don't match";
        }

        if (empty($this->errors)) {
            $user = new User();
            $user->setMail($mail);
            $user->setPassword($password);
            $sql = "INSERT INTO  `shop`.`user` (`mail` ,`password`)
                    VALUES (:mail, :password )";
            $requete = $this->connection->prepare($sql);
            $requete->bindValue(':mail', $mail);
            $requete->bindValue(':password', $password);
            if (!$requete->execute()) {
                $this->errors[] = "mail already in database";
            }

        }

        var_dump($this->errors);

        return $this->view->render("user/signup.twig",
            [ "categories" => $this->getCategories(),
                "errors" => $this->errors ]);

    }

    public function getUsers(){
        $sql = "SELECT * FROM `user`";

        $requete = $this->connection->prepare($sql);

        $requete->execute();
        $users = $requete->fetchAll(\PDO::FETCH_CLASS, "TroisWA\\Shop\\Model\\User");
        return $users;
    }

    public function getMails(){
        $sql = "SELECT `mail` FROM `user`";

        $requete = $this->connection->prepare($sql);

        $requete->execute();
        $users = $requete->fetchColumn();
        return $users;




        //voir le nombre de requetes retournees par pdo last insterted id



    }

    public function addUser(){

    }

}