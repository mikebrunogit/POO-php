<?php
    
    class Conta{
       private $titular;
       private $numeroConta;
       private $saldo;

    public function __construct ($titular, $numeroConta, $saldo){
        $this->setnumeroConta($numeroConta);
        $this->setTitular($titular);
        $this->setsaldo($saldo);
    }
    
    public function setnumeroConta($numeroConta){

        $this->numeroConta=$numeroConta;

    }

    public function setTitular($titular){

        $this->titular=$titular;

    }

    public function setsaldo($saldo){

        $this->saldo=$saldo;

    }

    public function getTitular(){
        return $this -> titular;
    }

    public function getsaldo(){
        return $this -> saldo;
    }


    public function getnumeroConta(){
        return $this -> numeroConta;
    }

     public function depositar($valor)
    {
      $this->saldo = $this->saldo + $valor;
      echo ("Quantia depositada: R$ $valor - Total: R$ $this->saldo <br>");
    }
     
     public function retirar($valor)
    {
      $this->saldo = $this->saldo - $valor;
      echo ("Quantia retirada: R$ $valor - Total: R$ $this->saldo <br>");
    }

    }

 $pessoa = new Conta("Mike", 11, 200);
    echo('Titular: '.$pessoa->getTitular().'<br>');
    echo('numero da conta: '.$pessoa->getnumeroConta().'<br>');
    echo('Saldo da conta: R$ '.$pessoa->getsaldo().'<br>');
   $pessoa->depositar(80);
   $pessoa->retirar(50);   
?>