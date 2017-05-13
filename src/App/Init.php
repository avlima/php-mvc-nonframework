<?php

namespace App;

use App\Init\Bootstrap;

/**
 * Class Init
 * @package App
 */
class Init extends Bootstrap
{

    /**
     * Método para setar rotas, baseadas em controlers e actions
     */
    protected function initRoutes()
    {
          //Rota de Conta Bancaria
          $ar['conta-bancaria-index'] = ['route' => '/', 'controller' => 'index', 'action' => 'index'];
          $ar['conta-bancaria-novo'] = ['route' => '/conta-bancaria/novo', 'controller' => 'index', 'action' => 'novo'];
          $ar['conta-bancaria-edit'] = ['route' => '/conta-bancaria/edit', 'controller' => 'index', 'action' => 'edit'];
          $ar['conta-bancaria-delete'] = ['route' => '/conta-bancaria/delete', 'controller' => 'index', 'action' => 'delete'];


                   $this->setRoutes($ar);   }



}
