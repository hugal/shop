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

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            header($_SERVER["SERVER_PROTOCOL"]." 405 Method Not Allowed");
            return $this->view->render("405.twig", ["categories" => $this->getCategories()]);
        }

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
            $user = $this->buildUser($mail, $password);
            if (!$this->addUser($user)) {
                $this->errors[] = "mail already exists in database";
            }
        }
        return $this->view->render("user/signup.twig",
            [ "categories" => $this->getCategories(),
                "errors" => $this->errors ]);

    }

    public function signinAction(){
        $mail = $this->request->post('email');
        $password = $this->request->post('password');

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            header($_SERVER["SERVER_PROTOCOL"]." 405 Method Not Allowed");
            return $this->view->render("405.twig", ["categories" => $this->getCategories()]);
        }

        if (!empty($mail) && !empty($password)) {

            $user = $this->getUserFromMail($mail);


            if ($user != null && $user->verifyPassword($password)) {

                $_SESSION['login'] = $mail;
                $this->flash->add("success", "login successful !");
                header("Location: index.php");
                die();
            } else {
                $this->errors[] = "login failed";
            }

        } else {
            $this->errors[] = "one or more empty field(s)";
        }


        $this->flash->add("warning",$this->errors);
        header("Location: index.php");
        die();


        //return $this->view->render("user/signin.twig",
         //   [ "categories" => $this->getCategories(),
           //     "errors" => $this->errors ]);
    }

    public function signoutAction(){
        session_destroy();
        header("Location: index.php");
        die();
    }

    private function getUsers(){
        return $this->dataSource->getUsers();
    }

    private function getUserFromMail($mail){
        return $this->dataSource->getUserFromMail($mail);
    }

    private function buildUser($mail, $password)
    {
        $user = new User();
        $user->setMail($mail);
        $user->setPassword($password);
        return $user;
    }

    private function addUser($user){
        return $this->dataSource->addUser($user);
    }

}