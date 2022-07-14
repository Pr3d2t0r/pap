<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campaign extends MY_Controller {


    public function __construct()
    {
        parent::__construct([], true);
        $this->load->library(array('form_validation'));
        $this->load->helper(array('uploadfile_helper'));
        $this->load->model(array('DiscountModel', 'CampaignsModel'));
    }

    public function index(){
        $this->data['campaigns'] = $this->CampaignsModel->getAll();
        $this->openView("campaign/index");
    }

    public function edit(){
        $body = $this->input->post();
        if (!isset($body['id'])){
            $this->session->set_flashdata("error_msg", "Acesso proibido!");
            redirect("campanhas");
        }
        $this->data['campaign'] = $this->CampaignsModel->getById($body['id']);
        $discounts = $this->DiscountModel->getAll();
        if (is_array($discounts))
            foreach ($discounts as $key => $discount){
                $campaign = $this->CampaignsModel->getForDiscount($discount['id']);
                $discounts[$key]['campaign'] = false;
                if (!empty($campaign))
                    $discounts[$key]['campaign'] = $campaign;

            }
        $this->form_validation->set_rules('title', 'Nome', 'trim|required|min_length[10]|max_length[30]');
        $this->form_validation->set_rules('description', 'Descrição', 'trim|required|min_length[15]|max_length[50]');
        $this->form_validation->set_rules('href', 'Rederecionamento', 'trim|required|min_length[10]|max_length[255]');

        if (!$this->form_validation->run()){
            $this->data['formError'] = validation_errors("<p class='text-danger small'>", "</p>");
        }else{
            $body = $this->input->post();
            $upload = new UploadFile("image", 'campaigns');
            $result = $upload->upload();
            if($result["error"] === false || $result==null){
                $id = $body['id'];
                unset($body['id']);
                if (!isset($result['empty']) || $result['empty'] === false)
                    $body["thumbnail"] = $result['file'];
                if (!isset($body['discount_id']))
                    $body['discount_id']=null;
                $this->CampaignsModel->update($id, $body);
                $this->session->set_flashdata("success_msg", "Campanha editada com sucesso!");
                redirect("campanhas");
            }else{
                $this->data['formError'] = "<p class='text-danger small'>Erro ao inserir o(s) ficheiro(s)</p>";
            }
        }

        $this->data['discounts'] = chunkArrayHalf($discounts);
        $this->openView("campaign/edit");
    }

    public function add(){
        $discounts = $this->DiscountModel->getAll();
        if (is_array($discounts))
            foreach ($discounts as $key => $discount){
                $campaign = $this->CampaignsModel->getForDiscount($discount['id']);
                $discounts[$key]['campaign'] = false;
                if (!empty($campaign))
                    $discounts[$key]['campaign'] = $campaign;
            }

        $this->form_validation->set_rules('title', 'Nome', 'trim|required|min_length[10]|max_length[30]');
        $this->form_validation->set_rules('description', 'Descrição', 'trim|required|min_length[15]|max_length[50]');
        $this->form_validation->set_rules('href', 'Rederecionamento', 'trim|required|min_length[10]|max_length[255]');

        if (!$this->form_validation->run()){
            $this->data['formError'] = validation_errors("<p class='text-danger small'>", "</p>");
        }else{
            $body = $this->input->post();
            $upload = new UploadFile("image", 'campaigns');
            $result = $upload->upload();
            if($result["error"] === false || $result==null){
                if (isset($result['empty']) && $result['empty'] === true){
                    $this->data['formError'] = "<p class='text-danger small'>Tem de inserir pelo menos uma imagem!</p>";
                }else{
                    $body["thumbnail"] = $result['file'];
                    $this->CampaignsModel->insert($body);
                    $this->session->set_flashdata("success_msg", "Campanha adicionada com sucesso!");
                    redirect("campanhas");
                }
            }else{
                $this->data['formError'] = "<p class='text-danger small'>Erro ao inserir o(s) ficheiro(s)</p>";
            }
        }

        $this->data['discounts'] = chunkArrayHalf($discounts ?? []);
        $this->openView("campaign/add");
    }

    public function remove(){
        $body = $this->input->post();
        if (!isset($body['id'])){
            $this->session->set_flashdata("error_msg", "Acesso proibido!");
            redirect("campanhas");
        }
        $this->CampaignsModel->delete($body['id']);
        $this->session->set_flashdata("success_msg", "Campanha removida com sucesso!");
        redirect("campanhas");
    }
}
