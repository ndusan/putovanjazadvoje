<?php

class CmsNewsletterController extends Controller
{
    
    public function subscribedAction($params)
    {
        $this->set('subscribedCollection', $this->db->findAllSubscribers());
    }
    
    public function deleteSubscribedAction($params)
    {
        if ($this->db->deleteSubscribed($params['id'])) {
            $this->redirect('cms'.DS.'newsletter', 'success');
        } else {
            $this->redirect('cms'.DS.'newsletter', 'error');
        }
    }
}