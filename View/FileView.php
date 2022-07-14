<?php

class FileView
{

    protected $msj;
    protected $template;
    protected $users;

    public function __construct()
    {

    }

    public function showLogin($msj=null)
    {
        $this->msj =$msj;
        $this->template = $this->getContentTemplate("login");
        echo $this->template; 
    }

    public function showFileForm($msj=null)
    {
        $this->msj =$msj;
        $this->template = $this->getContentTemplate("fileForm");
        echo $this->template;
    }

    public function showForm($msj=null)
    {
        $this->msj =$msj;
        header("Location:" . BASE_URL . "fileForm");
    }
    public function showHome()
    {
        header("Location:" . BASE_URL . "login");
    }
    public function getContentTemplate($fileName)
    {
        $file_path = 'templates/' . $fileName . '.php';
        if (is_file($file_path)) {
            ob_start();
            require($file_path);
            $template = ob_get_contents();
            ob_end_clean();
            return $template;
        } else {
            throw new Exception("Error No existe $file_path");
        }
    }
    
}
