<?php

namespace Digi\Keha\Controller;
use Digi\Keha\Kernel\Views;
use Digi\Keha\Kernel\AbstractController;
use Digi\Keha\Entity\Notes;
use Digi\Keha\Entity\Users;


class Index extends AbstractController {

    public function index()
    {
        $view = new Views();
        $tab = Users::getAll();
        $view->setHtml('index.html');
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setFooter('footer.html');
        $view->render([
         'flash' => $this->getFlashMessage(),
            'users' => $tab
        ]);
    }

    public function delete()
    {
        $result = false;
        $this->setFlashMessage('aucun enregistrement ne correspond','error');
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = Users::delete($id);
        }
        if ($result) {
            $this->setFlashMessage("L'enregistrement est bien supprimé", "success");   
        } 
        $this->index();      
    }

public function edit()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $user = Users::getById($id)[0];
        $view = new Views();
    $view->setHtml('showform.html');
    $view->setHead('head.html');
    $view->setHeader('header.html');
    $view->setFooter('footer.html');
    $view->render([
        'flash' => $this->getFlashMessage(),
        'user'=> $user,
    ]);

}
} 
    public function insert()
    {
        $view = new Views();
        $view->setHtml('createForm.html');
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setFooter('footer.html');
        $view->render([
            'flash' => $this->getFlashMessage(),

        ]);
    
        }
    
    
    
        public function update()
        {
            if(isset($_POST['submit'])){
                if(isset($_POST['name']) && $_POST['name']!==''){
                    if(isset($_POST['surname']) && $_POST['surname'] !==''){
                        
                        $result = false;
                        $this->setFlashMessage('aucun enregistrement ne correspond','error');
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
      
                            $result = Users::update($id, ['name'=>$_POST['name'], 'surname'=>$_POST['surname']]);
                            if ($result) {
                                $this->setFlashMessage("L'enregistrement est bien modifié", "success");   
                                $this->index();
                            }
                        
    
                    }
                }
            }
            else{$this->setFlashMessage("Veuillez remplir tous les champs",'warning');$this->edit();}
    
        }
    
        }
        public function create()
        {
            if(isset($_POST['submit'])){
                if(isset($_POST['name']) && $_POST['name']!==''){
                    if(isset($_POST['surname']) && $_POST['surname']!==''){
                        
                        $result = false;
                        $this->setFlashMessage('aucun enregistrement ne correspond','error');
                             $result = Users::insert(['name'=>$_POST['name'], 'surname'=>$_POST['surname']]);
                            if ($result) {
                                $this->setFlashMessage("L'enregistrement est bien créée", "success");   
                                $this->index();
                            }
        
                    }
                }
            }
    }
    

}

    