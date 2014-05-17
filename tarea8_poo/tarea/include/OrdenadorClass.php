<?php
class OrdenadorClass extends Producto {
  protected $procesador;
  protected $ram;
  protected $disco;
  protected $grafica;
  protected $optica;
  protected $so;
  protected $otros;
  
  public function getprocesador(){return $this->procesador;}
  public function getram(){return $this->ram;}
  public function getdisco(){return $this->disco;}
  public function getgrafica(){return $this->grafica;}
  public function getoptica(){return $this->optica;}
  public function getso(){return $this->so;}
  public function getotros(){return $this->otros;}
  
  public function __construct($row) {
    parent::__construct($row);
    $this->procesador = $row['procesador'];
    $this->ram = $row['RAM'];
    $this->disco = $row['disco'];
    $this->grafica = $row['grafica'];
    $this->optica = $row['unidadoptica'];
    $this->so = $row['SO'];
    $this->otros= $row['otros'];
  }  
}
?>