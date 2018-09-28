<?php
/**
 * Created by PhpStorm.
 * User: sun rise
 * Date: 11/20/2016
 * Time: 2:37 PM
 */

class Parts extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }

    public function index()
    {
        
    }

    
    ///////////////////////////////////////
    ///                                 ///
    ///     CRUD Section Starts         ///
    ///                                 ///
    ///////////////////////////////////////
    public function add()
    {
        if($this->isLoggedIn())
        {
            $data['parents']=$this->admin_model->getMenuParents();
            $data['menu']=$this->admin_model->getMenuItems();
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
                    array(
                        'field' =>  'partsname',
                        'label' =>  'Part Name',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'model',
                        'label' =>  'Model',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['models']=$this->admin_model->getAll('models');
                    $data['title']='Add Part | Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('parts/add');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->addPart($_POST);
                    $data['success']='Congratulations! Part Added Successfully';
                    $data['models']=$this->admin_model->getAll('models');
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['title']='Add Part | Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('parts/add');
                    $this->load->view('static/footer');
                }
            }
            else
            {
                $data['models']=$this->admin_model->getAll('models');
                //echo '<pre>';print_r($data);exit;
                $data['title']='Add Part | Admin Panel';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('parts/add');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }

    public function manage()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_items']=$this->admin_model->getAllParts();
            //echo '<pre>';print_r($data);exit;
            $data['title']='Manage Parts';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('parts/manage');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }

    public function edit()
    {

    }

    public function delete()
    {
        $menuId=$this->uri->segment(3);
        $this->admin_model->delPart($menuId);
        redirect(base_url().'parts/manage');
    }


    public function isLoggedIn()
    {
        if(!empty($this->session->userdata['id'])&& $this->session->userdata['type']=='admin')
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
?>
