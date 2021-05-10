<?php



use Phalcon\Mvc\Model;
use Phalcon\Paginator\Adapter\Model as Paginator;

class Noticia extends Model
{
    private $id;
    private $titulo;
    private $texto;
    private $data_ultima_atualizacao;
    private $data_cadastro;

    //id
    public function getId(){
        return $this->id ;
    }
    public function setId($identidade02){
        $this->id=$identidade02;
    }


    //titulo
    public function getTitulo(){
        return $this->titulo;
    }
    public function setTitulo($titular){
        $this->titulo=$titular;
    }

    //texto
    public function getTexto(){
        return $this->texto;
    }
    public function setTexto($text){
        $this->texto=$text;
    }

    //data_ultima_atualizacao
    public function getData_ultima_atualizacao(){
        return $this->data_ultima_atualizacao;
    }
    public function setData_ultima_atualizacao($atualizacao02){
        $this->data_ultima_atualizacao=$atualizacao02;
    }

    //data_cadastro
    public function getData_cadastro(){
        return $this->data_cadastro;
    }
    public function setData_cadastro($data_do_cadastro){
        $this->data_cadastro=$data_do_cadastro;
    }


    //public function setTexto
    public function initialize()
    {
        $this->setSource("noticia");
    }
    
    public function validation($texto);{
       if(strlen($this->titulo)>255){
           $message = new Message(
               'Tamanho do titulo ultrapassa o estabelecido',
               'string',
               'titulo'
           );

           $this->appendMessage($message);
       }
    }
    
}