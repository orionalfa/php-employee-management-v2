<?php
class Controller{
    function __construct(){
        // if(EXECUTION_FLOW)
        echo '<p>Base controller class</p>';
        $this->view = new View();
        $this->loadModel(get_class($this) . "Model");
    }

    function loadModel($model){
        $url = MODELS . '/' . $model . 'Model.php';

        if(file_exists($url)){
            require $url;

            $modelName = $model . 'Model';

            $this->model = new $modelName();
        }
    }
}
