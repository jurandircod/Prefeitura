<?php

namespace App\View;


class Pages
{
   private $locais;
   private $ramaisEx;
   private $ramaisIn;
   private $secretaria;

   private function cadastrarLocais()
   {
      include('Cadastrar/Locais.php');
   }
   private function cadastrarRamaisEx()
   {
      include('Cadastrar/RamaisEx.php');
   }
   private function cadastrarRamaisIn()
   {
      include('Cadastrar/RamaisIn.php');
   }

   private function cadastrarSecretaria()
   {
      include('Cadastrar/Secretaria.php');
   }

   private function cadastrarUsuario()
   {
      include('Cadastrar/Usuario.php');
   }

   private function mostrarSearch()
   {
      include('Search.php');
   }

   private function mostrarRamaisIn()
   {
      include('ramaisIn.php');
   }

   public function mostrarCadastramento($pages)
   {
      switch ($pages) {
         case "locais":
            $this->cadastrarLocais();
            break;
         case "ramaisIn":
            $this->cadastrarRamaisIn();
            break;
         case "ramaisEx":
            $this->cadastrarRamaisEx();
            break;
         case "secretaria":
            $this->cadastrarSecretaria();
            break;
         case "usuario":
            $this->cadastrarUsuario();
            break;
         case "search":
            $this->mostrarSearch();
            break;
         case "ramaisInSearch":
            $this->mostrarSearch();
            break;
         default:
            $this->mostrarRamaisIn();
            break;
      }
   }
}
