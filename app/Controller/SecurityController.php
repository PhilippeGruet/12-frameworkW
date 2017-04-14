<?php

namespace Controller;

use \W\Controller\Controller;
use Model\UserModel;

class SecurityController extends Controller
{
    /**
     * Connexion
    */
    public function login() {
        $username   = '';
        $message    = [''];

        if (!empty($_POST)) {
            $username   = trim($_POST['username']);
            $password   = trim($_POST['password']);

            $auth_manager = new \W\Security\AuthentificationModel();

            // Ca marche en php
            if ( $user_id = $auth_manager->isValidLoginInfo($username, $password) ) {
                $user_manager = new UserModel();
                $user = $user_manager->find($user_id);
                $auth_manager->logUserIn($user);

                $this->redirectToRoute('default_home');
            } else {
                $message['error'] = "Mauvais Identifiant ou mot de passe";
            }
        }
        $this->show('security/login', [
            'message'=>$message,
            'username'=>$username,
        ]);
    }


    /**
    * Déconnexion
    */
    public function logout() {
        $auth_manager = new \W\Security\AuthentificationModel();
        $auth_manager->logUserOut();
        $this->redirectToRoute('default_home');
    }


    /**
    * Inscription
    */
    public function register() {
        $username   = '';
        $email      = '';
        $password   = '';
        $cfpassword = '';

        $message    = [''];

        // Formulaire envoyé
        if (!empty($_POST)) {
            $username   = trim($_POST['username']);
            $email      = trim($_POST['email']);
            $password   = trim($_POST['password']);
            $cfpassword = trim($_POST['cfpassword']);
            $errors = [];

            // Vérification des champs
            $user_manager = new UserModel();
            // Presence de l'email ou de l'username en bdd ?
            if ( $user_manager->emailExists($email) || $user_manager->usernameExists($username) ) {
                $errors['exists'] = "L'email ou le login existe deja";
            }

            // Champ valide
            if ( empty($username) || !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
                $errors['username'] = "L'email ou username sont vides ou non valides";
            }

            // Correspondance des mots de passe
            if ($password != $cfpassword) {
                $errors['password'] = "Les mots de passe ne correspondent pas";
            }


            // Enregistrement en bdd, s'il n'y a pas d'erreurs
            if ( empty($errors) ) {
                echo "pas d'erreur";
                $auth_manager = new \W\Security\AuthentificationModel();
                $user_manager->insert([
                    'username' => $username,
                    'email'    => $email,
                    'password' => $auth_manager->hashPassword( $password ),
                    'role'     => 'admin',
                ]);
                $message = ['success'=>"Vous etes bien inscrit"];
            } else {
                $message = $errors;
            }
            // Redirection

        }

        $this->show('security/register', [
            'messages'=>$message,
            'username'=>$username,
            'email'=>$email,
        ]);
    }

}
