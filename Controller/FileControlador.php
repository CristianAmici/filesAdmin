<?php
require_once "./RouterFinal.php";
require_once "Model/UserModel.php";
require_once "View/FileView.php";
class FileControlador
{

    private $view;
    private $model;

    function __construct()
    {
        $this->view = new FileView();
        $this->model = new UserModel();
    }

    function logout()
    {
        session_start();
        session_destroy();
        $this->view->showLogin();
    }

    function login()
    {
        $this->view->showLogin();
    }

    function insertFile()
    {
        $users = $this->model->getUsers();
        session_start();
        if (!empty($_SESSION['nombre_usuario'])) {

           if (empty($_POST['create_name'])) {

                $this->view->showFileForm("Ingrese un nombre", $users);
            } else {
                if ($this->model->getUserByName($_POST['create_name'])) {

                    $this->view->showFileForm("El nombre de usuario ya existe", $users);
                }else {

                    $hash = password_hash($_POST['create_password'], PASSWORD_DEFAULT);
                    $user = $_POST["create_name"];
                    $userFromDB = $this->model->getUserByName($user);
                    if ($userFromDB) {
                        $this->view->showFileForm("La cuenta ya existe", $users);
                    } else {
                        $this->model->createUser($_POST['create_name'],$hash ,$_POST['admin'], $_POST['geoserver']);
                        $users = $this->model->getUsers();
                        $this->view->showFileForm("Cargado exitosamente", $users);
                    }
                }
            }
        }
    }
    function verifyUser()
    {
        $user = $_POST["verify_name"];
        $pass = $_POST["verify_password"];

        if (!empty($user)) {
            $userFromDB = $this->model->getUserByName($user);

            if (isset($userFromDB) && $userFromDB) {
                // Existe el usuario


                if ($pass=="123456") {

                    session_start();
                    $_SESSION['name_user'] = $userFromDB->name_user;

                    $this->view->showForm();
                } else {
                    $this->view->showLogin("Contraseña incorrecta");
                }
            } else {
                // No existe el user en la DB
                $this->view->showLogin("El usuario no existe");
            }
        } else {
            $this->view->showLogin("Ingrese un nombre de usuario");
        }
    }

    function deleteUser($params = null)
    {
        session_start();
        if (!empty($_SESSION['name_user'])) {
            $id = $params[':ID'];
            $this->model->deleteUser($id);
            $this->view->showForm();
        }
    }

    function getFileForm()
    {
        if(session_status()!=2)
        session_start();
        if (!empty($_SESSION['name_user'])) {

            $this->view->showFileForm("");
        } else {
            $this->view->showLogin();
        }
    }
}
