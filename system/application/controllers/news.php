<?php
class News extends CI_Controller{
 function __construct()
  {
    parent::__construct(); 

    // load helpers
    $this->load->helper('url');
  }
 
public function add()
{
     $data = array('a'=>'welcome',
	 'b'=>'this is my view',
	 'c'=>'good',
	 );
	 $data['dodo'] =array(1,2,3,4,5);

    $da['hi'] =  $this->load->view('test.html',$data,true) ;
       $this->load->view('tt.html',$da);
	

}
public function index()
{
     $this->load->view('show.html');
	 }
	public function input (){
	 $data = array(
   'user_id'=>$this->input->get('memName'),
   'user_name'=>$this->input->get('memId'),
   'user_company'=>$this->input->get('memPsw'),
   'user_text'=> $this->input->get('email'),
   );
   
    $this->load->model('mdin');
    $this->mdin->insert($data);
	 redirect('news','refresh');
	
	}
	
	public function listing()
  {
    $this->load->library('table');
    $this->load->model('mdin','',TRUE);
    $news_qry = $this->mdin->listall();
    $data['news_qry'] =  $news_qry;
    $this->load->view('tt.html', $data);
  }
  
  
  
  public function delete($s)
  {
      $s  = $this->uri->segment(3);
    
     $this->load->model('mdin');
     $this->mdin->delete($s);
     redirect('news/listing','refresh');
  }
	function edit( )
  {
     $this->load->helper('form');

     $s = $this->uri->segment(3);
     $this->load->model('mdin' );
     $data['row'] = $this->mdin->get($s)->result();

    // display information for the view
	$data['title'] = " ";
    $data['headline'] = " ";
    $data['include'] = ' ';

    
	$this->load->view('up.html', $data);
     
  }
   function update()
  {
    $this->load->model('mdin','',TRUE);
    $this->mdin->upup($_POST['user_id'], $_POST);
    redirect('news/listing','refresh');
  }
   function up()
  {
    
  }
}
?>
