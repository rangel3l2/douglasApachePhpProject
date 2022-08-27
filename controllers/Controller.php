<?php

class Controller
{
  
  public function model($model)
  {
    require 'models/' . $model . '.php';
    $classe = new $model();
	
    return new $classe();
  }

 
  public function view(string $view, $data = [])
  {
    require 'views/' . $view . '.php';
  }


  public function pageNotFound()
  {
    $this->view('erro404');
  }
}
?>