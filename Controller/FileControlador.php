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
        if (!empty($_SESSION['name_user'])) {

            if (
                empty($_FILES['newFile']['name'])
                && empty($_FILES['newFile']['tmp_name'])
            ) {
                $this->view->showFileForm("Ingrese un archivo");
            } else {

                if (!is_uploaded_file($_FILES['newFile']['tmp_name'])) {
                    $this->view->showFileForm("El archivo no fue procesado correctamente");
                } else {

                    $source = $_FILES['newFile']['tmp_name'];
                    $destination = 'C:\xampp\tomcat\webapps'.$_FILES['newFile']['name'];
                    if (is_file($destination)) {
                        @unlink(ini_get('upload_tmp_dir').$_FILES['newFile']['tmp_name']);
                        $this->view->showFileForm("El archivo ya existe");
                    } else {
                        if(!@move_uploaded_file($source,$destination)){
                            @unlink(ini_get('upload_tmp_dir').$_FILES['newFile']['tmp_name']);
                            $this->view->showFileForm("no se pudo mover el archivo");
                        } else {
                            $this->view->showFileForm("Cargado exitosamente");
                        }
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


                if ($pass == "123456") {

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
        if (session_status() != 2)
            session_start();
        if (!empty($_SESSION['name_user'])) {

            $this->view->showFileForm("");
        } else {
            $this->view->showLogin();
        }
    }
}
