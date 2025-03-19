<?php
//__NM__Encripta / desencripta__NM__FUNCTION__NM__//
class encriptador{
   private $semilla;
function __construct($parm=NULL){
   $args = func_get_args();
   if(empty($args))
      $this->semilla = 'Semilla_goodESoftware';
   else
      $this->semilla = $parm;
}
private function edita($texto){
   $r = md5($this->semilla);
   $n=0;
   $valor = "";
   for ($i=0;$i<strlen($texto);$i++) {
      if ($n==strlen($r)) $n=0;
      $valor.= substr($texto,$i,1) ^ substr($r,$n,1);
      $n++;
   }
   return $valor;
}
function encripta($texto){
   $r = md5(rand(0,32000));
   $n=0;
   $valor = "";
   for ($i=0;$i<strlen($texto);$i++){
      if ($n==strlen($r)) $n=0;
      $valor.= substr($r,$n,1).(substr($texto,$i,1) ^ substr($r,$n,1));
      $n++;
   }
   return base64_encode($this->edita($valor));
}
function desencripta($texto){
   $texto = $this->edita(base64_decode($texto));
   $valor = "";
   for ($i=0;$i<strlen($texto);$i++){
      $md5 = substr($texto,$i,1);
      $i++;
      $valor.= (substr($texto,$i,1) ^ $md5);
   }
   return $valor;
}
function __destruct(){
   $this->semilla = '';
}
}
?>