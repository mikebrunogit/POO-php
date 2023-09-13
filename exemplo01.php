<meta charset="UTF-8">
<?php

    class Calculadora{
        private $num1;
        private $num2;


    public function setnum1($num1){

        $this->num1=$num1;

    }

    public function setnum2($num2){

        $this->num2=$num2;

    }

    public function getnum1(){
        return $this -> num1;
    }

    public function getnum2(){
        return $this -> num2;
    }


    public function somar()
    {
      $soma=$this->num1+$this->num2;
      echo("Resultado da Soma: $soma <br>");
    }//acaba o metodo somar
 
    public function subtrair()
    {
        $sub=$this->num1-$this->num2;
        echo("Resultado da Subtração: $sub <br>");
    }//acaba o metodo subtrair

        public function multiplicar()
    {
      $multi=$this->num1*$this->num2;
      echo("Resultado da Multiplicação: $multi <br>");
    }//acaba o metodo somar

    public function dividir()
    {
      $div=$this->num1/$this->num2;
      echo("Resultado da Divisão: $div <br>");
    }//acaba o metodo somar

    public function __construct ($num1, $num2){
        $this->setnum1($num1);
        $this->setnum2($num2);
    }

    }//acaba a classe Calculadora

    $cal1 = new Calculadora(11, 10);
    //$cal1->num1=89;
    //$cal1->setnum1(2);
    //echo("primeiro numero: $cal1->num1<br>");
    echo('Primeiro número: '.$cal1->getnum1().'<br>');
    //$cal1->setnum2(2);
    echo('Segundo número: '.$cal1->getnum2().'<br><br>');
    //echo("segundo numero: $cal1->num2<br>");
    $cal1->somar();
    $cal1->subtrair();
    $cal1->multiplicar();
    $cal1->dividir();

    class CalculadoraCientifica extends Calculadora{
        
        private $pi;
    
    public function __construct ($num1, $num2){
        parent::__construct($num1, $num2);
        $this->setpi();
    }



        public function setpi(){
            $this->pi=3.14;
        }

        public function getpi(){
            return $this->pi;
        }        
    

    }


?>


<br><br><a href="./exercicios/exec.php"> ATV 1</a>