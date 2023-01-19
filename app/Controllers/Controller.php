<?php 
    namespace App\Controllers;

    class Controller{
        public function view(string $path, array $params = null){
            ob_start();
            $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
            //require VIEWS . $path . '.php';
            //var_dump($params);
            if($params){
               //$params = extract($params);
               require VIEWS . $path . '.php';

        } else {
            require VIEWS . $path . '.php';
        }    
        $content = ob_get_flush();

        require VIEWS . 'default.php';
        }
    }
?>