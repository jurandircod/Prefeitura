<?php

namespace App\View;


class Pages
{

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
      include('RamaisEx.php');
   }

   private function mostrarRamaisIn()
   {
      include('RamaisIn.php');
   }

   private function mostrarLocais()
   {
      include('Cadastrar/Locais.php');
   }

   public function mostrarCadastramento($pages)
   {
      switch ($pages) {
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
         case "locais":
            $this->mostrarLocais();
            break;
         default:
            $this->mostrarRamaisIn();
            break;
      }
   }

   public function mostrarBuscadores($pages)
   {
      switch ($pages) {
         case "search":
            $this->mostrarSearch();
            break;
         case "ramaisInSearch":
            $this->mostrarRamaisIn();
            break;
         default:
            $this->mostrarRamaisIn();
            break;
      }
   }
}
