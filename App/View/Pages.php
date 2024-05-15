<?php


namespace App\View;


class Pages
{
   private $locais;
   private $ramaisEx;
   private $ramaisIn;
   private $secretaria;

   public function mostrarLocais()
   {
      include('Cadastrar/Locais.php');
   }

   public function mostrarRamaisEx()
   {
        
      include('Cadastrar/RamaisEx.php');
   
   }

   public function mostrarRamaisIn()
   {
      include('Cadastrar/RamaisIn.php');
   }

   public function mostrarSecretaria()
   {
      include('Cadastrar/Secretaria.php');
   }

   public function mostrarUsuario()
   {
      include('Cadastrar/Usuario.php');
   }

   public function mostrarSearch()
   {
      $ramaisEx = new \App\Model\RamaisEx\RamaisEx;
      $ramaisExDao = new \App\Model\RamaisEx\RamaisExDao;
      $pages = new \App\View\Pages;

      $sql = "SELECT * FROM tbramais_ex";
      $ramaisExDao->setSqlRead($sql);
      $listaRamais = $ramaisExDao->read();
      include('Cadastrar/Search.php');
   }
}
