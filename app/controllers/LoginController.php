<?php

class LoginController extends Controller
{
    
    public function indexAction($params)
    {

        if(!empty($params['login'])){
            $this->setRenderHTML(0);
            if($user = $this->db->getUser($params['login'])){
                
                $_SESSION['cms'] = $user;
                $this->redirect('cms', 'welcome');
            }else{

                $this->redirect('login', 'error');
            }
        }
    }
    
    
    
    public function logoutAction($params)
    {
        
        //Delete session
        $_SESSION['cms'] = null;
        unset($_SESSION['cms']);
        $this->redirect('login', '');
    }
    
    
}