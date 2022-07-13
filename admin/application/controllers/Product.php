<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {


    public function __construct()
    {
        parent::__construct([], true);
        $this->load->library(array('form_validation'));
        $this->load->helper(array('uploadfiles_helper'));
        $this->load->model(array('ProductModel', 'DiscountModel', 'CampaignsModel'));
    }

    public function index(){
        $this->data['products'] = $this->ProductModel->getAll();
        $this->openView("product/index");
    }

    public function remove(){
        $body = $this->input->post();
        if (!isset($body['id'])){
            $this->session->set_flashdata("error_msg", "Acesso proibido!");
            redirect("produtos");
        }
        $this->ProductModel->delete($body['id']);
        $this->session->set_flashdata("success_msg", "Produto removido com sucesso!");
        redirect("produtos");
    }

    public function edit(){
        $body = $this->input->post();
        if (!isset($body['id'])){
            $this->session->set_flashdata("error_msg", "Acesso proibido!");
            redirect("produtos");
        }
        $this->data['product'] = $this->ProductModel->getById($body['id']);
        $discounts = $this->DiscountModel->getAll();
        foreach ($discounts as $key => $discount){
            $campaign = $this->CampaignsModel->getForDiscount($discount['id']);
            $discounts[$key]['campaign'] = false;
            if (!empty($campaign))
                $discounts[$key]['campaign'] = $campaign;
        }
        $this->form_validation->set_rules('reference', 'Referencia', 'trim|required|min_length[15]|max_length[15]');
        $this->form_validation->set_rules('title', 'Nome', 'trim|required|min_length[15]|max_length[80]');
        $this->form_validation->set_rules('meta_title', 'Titulo da Pagina', 'trim|required|min_length[10]|max_length[80]');
        $this->form_validation->set_rules('description', 'Descrição', 'trim|required|min_length[15]|max_length[400]');
        $this->form_validation->set_rules('price', 'Preço', 'trim|required');

        if (!$this->form_validation->run()){
            $this->data['formError'] = validation_errors("<p class='text-danger small'>", "</p>");
        }else{
            $body = $this->input->post();
            $upload = new UploadFiles("images", 'produtos');
            $result = $upload->upload();
            if($result["error"] === false || $result==null){
                $id = $body['id'];
                unset($body['id']);
                $this->ProductModel->update($id, $body);
                if (!isset($result['empty']) || $result['empty'] === false)
                    $this->ProductModel->storeImages($id, $result, false);
                $this->session->set_flashdata("success_msg", "Produto editado com sucesso!");
                redirect("produtos");
            }else{
                var_dump($result);
                $this->data['formError'] = "<p class='text-danger small'>Erro ao inserir o(s) ficheiro(s)</p>";
            }
        }
        $this->data['discounts'] = chunkArrayHalf($discounts);
        $this->data['metadata'] = $this->ProductModel->getMetaDataForProduct($body['id']) ?? [];
        $this->openView("product/edit");
    }

    public function add(){
        $discounts = $this->DiscountModel->getAll();
        foreach ($discounts as $key => $discount){
            $campaign = $this->CampaignsModel->getForDiscount($discount['id']);
            $discounts[$key]['campaign'] = false;
            if (!empty($campaign))
                $discounts[$key]['campaign'] = $campaign;

        }

        $this->form_validation->set_rules('reference', 'Referencia', 'trim|required|min_length[15]|max_length[15]');
        $this->form_validation->set_rules('title', 'Nome', 'trim|required|min_length[15]|max_length[80]');
        $this->form_validation->set_rules('meta_title', 'Titulo da Pagina', 'trim|required|min_length[10]|max_length[80]');
        $this->form_validation->set_rules('description', 'Descrição', 'trim|required|min_length[15]|max_length[400]');
        $this->form_validation->set_rules('price', 'Preço', 'trim|required');

        if (!$this->form_validation->run()){
            $this->data['formError'] = validation_errors("<p class='text-danger small'>", "</p>");
        }else{
            $body = $this->input->post();
            $upload = new UploadFiles("images", 'produtos', ["dimen" => ["width" => 166, "height" => 150, "ratio" => true]]);
            $result = $upload->upload();
            if($result["error"] === false || $result==null){
                if (isset($result['empty']) && $result['empty'] === true){
                    $this->data['formError'] = "<p class='text-danger small'>Tem de inserir pelo menos uma imagem!</p>";
                }else {
                    $id = $this->ProductModel->insert($body);
                    $this->ProductModel->storeImages($id, $result);
                    $this->session->set_flashdata("success_msg", "Produto criado com sucesso!");
                    redirect("produtos");
                }
            }else{
                var_dump($result);
                $this->data['formError'] = "<p class='text-danger small'>Erro ao inserir o(s) ficheiro(s)</p>";
            }
        }

        $this->data['discounts'] = chunkArrayHalf($discounts);
        $this->openView("product/add");
    }
}
