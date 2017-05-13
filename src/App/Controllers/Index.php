<?php

namespace App\Controllers;

use App\Di\Container;
use App\Controllers\Action;

class index extends Action{


    protected $model = "contaBancaria";

    public function index()
    {
        //Carregamos o modulo da conta bancaria
        $model = Container::getClass($this->model);
        //Fazemos uma consulta retornando todos as contas
        //Enviamos o resultado para a view
        $this->view->index  = $model->fetchAll();
        $this->render('index');
    }

     public function novo()
     {
        //Carregamos o modulo da conta bancaria
        $model= Container::getClass($this->model);

       //Renderezamos a view new
        $this->render('new');

        //Recebemos um POST, se for verdadeiro
        if (count($_POST) )
              {

                    //Salvamos o novo objeto da conta
                    $model-> insert($_POST);
                    $this->view->sucesso = true;
                    header("Location:/");
             }
    }

    public function edit()
    {

         //Carregamos o modulo de Conta Bancária
        $model                  = Container::getClass($this->model);

         //Pegamos o POST
        $id = $_POST;

        //Se o POST estiver vazio
        if(isset($id))
            {
            // Fazemos uma consulta e printamos os dados do da conta através do GET Id
            $this->view->dados = $model->findContaBancaria($_GET['id']);

             }

             $this->render('edit');

         //Se o post chegar populado
        if(!empty($id))
         {

            //Fazemos a atualização dos dados
            $model->update($id);
            $this->view->sucesso = true;
            header("Location:/");
         }

    }

    public function delete()
    {
        //Pegamos o id da URL
        $id = $_GET['id'];

        //Carregamoso modulo de cliente
        $model = Container::getClass($this->model);
        //Deletamos o cliente
         $model->delete($id);
         $this->view->sucesso = true;

         header("Location:/");
    }
}