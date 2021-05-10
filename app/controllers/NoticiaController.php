<?php


class NoticiaController extends ControllerBase
{
    private $mensagemDeErro = '';

    public function listaAction()
    {
        $noticias = Noticia::find();
        $this->view->setVar('noticias',$noticias);
        $this->view->pick("noticia/listar");
    }

    public function cadastrarAction()
    {
        
        $this->view->pick("noticia/cadastrar");

    }

    public function editarAction($id)
    {
        $noticia = Noticia::findFirst('id='.$id);
        $this->view->setVar('noticia',$noticia);
        $this->view->pick("noticia/editar");
       
    }

    public function salvarAction()
    {
        if(isset($_GET['id'])){
            $noticia = Noticia::findFirst('id='.$id);
        }else{
            $noticia = new Noticia();
            $noticia->setData_cadastro( date("Y-m-d H:i:s"));
        }
        $noticia->setTitulo($_POST['titulo']);
        $noticia->setTexto($_POST["texto"]);
        $noticia->setData_ultima_atualizacao( date("Y-m-d H:i:s"));
        $noticia->save();
        $this->flash->success('Noticia salva com sucesso.');
        return $this->response->redirect(array('for' => 'noticia.lista'));
    }

     public function excluirAction($id)
     {
        $noticia = Noticia::findFirst('id='.$id);
        $noticia->delete();
        $this->flash->success('Noticia apagada com sucesso.');
        return $this->response->redirect(array('for' => 'noticia.lista'));
     }

}