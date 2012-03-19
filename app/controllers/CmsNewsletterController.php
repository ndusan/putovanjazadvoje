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
    
    public function exportAction($params)
    {
        
        $response = $this->db->findAllSubscribers();
        
        //Add header
        $output = 'Email,Status,Created';
        $output.= "\n";
        foreach($response as $r){
            $output.= $r['email'].','.$r['status'].','.$r['created'];
            $output.= "\n";
        }
        
        // Output to browser with appropriate mime type, you choose ;)
	header("Content-type: text/x-csv");
	//header("Content-type: text/csv");
	//header("Content-type: application/csv");
	header("Content-Disposition: attachment; filename=search_results.csv");
	
        echo $output;
	exit;
    }
}