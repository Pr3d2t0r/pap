<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("CartItemsModel", "CartModel", "PersonalInfoModel", "PaymentInfoModel", "OrderModel", "OrderItemsModel", "DiscountModel", "ProductModel", "ShopModel"));
        $this->load->library(array('form_validation'));
        $this->data['checkout'] = true;
        $this->data['formErrors'] = null;
    }

    public function checkout()
	{

        $this->data['cart'] = $this->isLoggedIn ? $this->CartModel->getForUser($this->user->id) : null;
        if ($this->data['cart'] != null)
            $this->data['cartItems'] = $this->CartItemsModel->getForCart($this->data['cart']['id']);

        $this->data['personalInfo'] = $this->isLoggedIn ? $this->PersonalInfoModel->getFromUser($this->user->id) : null;

        if ($this->isLoggedIn){
            $result = $this->input->post();
            $newInfo = isset($result['new_info']);
            if ($newInfo) {
                $this->form_validation->set_rules('first_name', 'Primeiro Nome!', 'required|min_length[3]|max_length[160]');
                $this->form_validation->set_rules('last_name', 'Ultimo Nome', 'required|min_length[3]|max_length[160]');
                $this->form_validation->set_rules('phone_number', 'Nº de telemovel', 'required|min_length[9]|max_length[9]  ');
                $this->form_validation->set_rules('address', 'Morada', 'required|min_length[5]');
                $this->form_validation->set_rules('country', 'País', 'required|min_length[5]');
                $this->form_validation->set_rules('city', 'Cidade', 'required|min_length[5]');
            }else{
                $this->form_validation->set_rules('personal_info_id', 'Informação', 'required');
            }

            if (!$this->form_validation->run()){
                if ($newInfo) {
                    $this->data['formErrors'] = [
                        "first_name" => [
                            "error" => form_error("first_name"),
                            "value" => $result["first_name"] ?? ""
                        ],
                        "last_name" => [
                            "error" => form_error("last_name"),
                            "value" => $result["last_name"] ?? ""
                        ],
                        "phone_number" => [
                            "error" => form_error("phone_number"),
                            "value" => $result["phone_number"] ?? ""
                        ],
                        "address" => [
                            "error" => form_error("address"),
                            "value" => $result["address"] ?? ""
                        ],
                        "country" => [
                            "error" => form_error("country"),
                            "value" => $result["country"] ?? ""
                        ],
                        "city" => [
                            "error" => form_error("city"),
                            "value" => $result["city"] ?? ""
                        ]
                    ];
                    $this->session->set_flashdata("openModal", "PersonalInfo");
                }else{
                    $this->data['formErrors'] = [
                        "personal_info_id" => [
                            "error" => form_error("personal_info_id")
                        ]
                    ];
                }
            }else{
                $this->data['formErrors'] = null;
                if ($newInfo) {
                    unset($result['new_info']);
                    $this->session->set_flashdata("success_msg", "Novas informações adicionadas com sucesso!");
                    $result['user_id'] = $this->user->id;
                    $pi_id = $this->PersonalInfoModel->insert($result);
                }else
                    $pi_id = $result['personal_info_id'];
                $this->CartModel->associateUserInfo($this->data['cart']['id'], $pi_id);
                redirect("pagamento");
            }
        }
        $this->openView("cart/checkout");
	}

    public function payment()
	{
        if (!$this->isLoggedIn) {
            redirect("checkout");
            return;
        }

        $this->data['cart'] =  $this->CartModel->getForUser($this->user->id);
        $this->data['paymentInfo'] = $this->PaymentInfoModel->getFromUser($this->user->id);

        $amounts = $this->calculate();

        $this->data['total'] = number_format($amounts['total'], 2);
        $this->data['subtotal'] = number_format($amounts['subtotal'], 2);
        $this->data['envio'] = number_format($amounts['envio'], 2);

        $this->openView("cart/payment");
	}

    public function old(){
        if (!$this->isLoggedIn) {
            redirect("checkout");
            return;
        }
        $this->data['cart'] = $this->CartModel->getForUser($this->user->id);
        $body = $this->input->post();
        if (!isset($body['payment_info_id'])){
            $this->session->set_flashdata("old_card_info_error", "Por favor selecione um cartão ou escolha uma das outras opções!");
            redirect('pagamento#parentHorizontalTab1');
            return;
        }

        $this->data['cart'] = $this->CartModel->associatePaymentInfo($this->data['cart']['id'], $body['payment_info_id']);
        $reference = $this->complete();

        $this->session->set_flashdata("success_msg", "Compra efetuada com sucesso! Referência do Pedido: $reference");
        $this->session->set_flashdata("openModal", "RESET_CART");
        redirect();
    }

    public function new(){
        if (!$this->isLoggedIn) {
            redirect("checkout");
            return;
        }
        $this->data['cart'] = $this->CartModel->getForUser($this->user->id);

        $this->form_validation->set_rules('name', 'Nome!', 'required|min_length[3]|max_length[200]');
        $this->form_validation->set_rules('number', 'Nº do cartão', 'required|min_length[19]|max_length[19]  ');
        $this->form_validation->set_rules('cvv', 'CVV', 'required|min_length[3]|max_length[3]');
        $this->form_validation->set_rules('expiration-month-and-year', 'Data de validade', 'required');

        if (!$this->form_validation->run()){
            $this->session->set_flashdata("form_errors", validation_errors());
            redirect("pagamento");
        }
        $body = $this->input->post();
        $old_date = explode(" / ", $body['expiration-month-and-year']);
        $body["valid_til"] = $old_date[1]."/".$old_date[0]."/01";
        if (isset($body["remember"]))
            $body["user_id"] = $this->user->id;
        unset($body['expiration-month-and-year']);
        unset($body['remember']);
        $payment_info_id = $this->PaymentInfoModel->insert($body);
        $this->session->set_flashdata("openModal", "RESET_CART");
        $this->data['cart'] = $this->CartModel->associatePaymentInfo($this->data['cart']['id'], $payment_info_id);


        $reference = $this->complete();

        $this->session->set_flashdata("success_msg", "Compra efetuada com sucesso! Referência do Pedido: $reference");
        redirect();
    }

    public function gotto(){
        redirect("checkout");
    }

    private function calculate(){
        $items = $this->CartItemsModel->getForCart($this->data['cart']['id'], "OBJECT");
        $subtotal = 0;
        $envio = 0;
        foreach ($items as $key => $item){
            $discountObj = $this->DiscountModel->getById($item->discount_id ?? -1, "OBJECT");
            $product = $this->ProductModel->getById($item->product_id ?? -1, "OBJECT");
            $items[$key]->price = $product->price;
            if ($discountObj != null)
                $discount = $item->price * ($discountObj->discount/100);
            $subtotal += (($item->price * $item->quantity) - $discount ?? 0);
            $envio += 0.6;
            $items[$key]->total = (($item->price * $item->quantity) - $discount ?? 0);
        }
        return [
            "items"    => $items,
            "subtotal" => $subtotal,
            "envio"    => $envio,
            "total"    => $subtotal + $envio
        ];
    }

    private function complete(){
        $amounts = $this->calculate();
        $shopId = $this->findBestShop($amounts['items']);
        $orderId = $this->OrderModel->insert([
            "user_id" => $this->user->id,
            "sub_total" => $amounts['subtotal'],
            "shipping" => $amounts['envio'],
            "total" => $amounts['total'],
            "personal_info_id" => $this->data['cart']['personal_info_id'],
            "payment_info_id" => $this->data['cart']['payment_info_id'],
            "shop_id" => $shopId,
        ]);
        foreach ($amounts['items'] as $cartItem){
            $this->ProductModel->reserve($cartItem->product_id, $shopId, $cartItem->quantity);
            $this->OrderItemsModel->insert([
                "product_id" => $cartItem->product_id,
                "order_id" => $orderId,
                "total" => $cartItem->total,
                "discount_id" => $cartItem->discount_id ?? null,
                "quantity" => $cartItem->quantity,

            ]);
        }

        return $this->OrderModel->getReference($orderId);
    }

    private function findBestShop($items){
        $shops = $this->ShopModel->getAll();
        $bigest = [
            "shop_id" => null,
            "avg"     => -999999
        ];
        foreach ($shops as $shop){
            $x = 0;
            $avg = 0;
            foreach($items as $item){
                $quantity = $this->ProductModel->getStockForProduct($item->product_id, $shop['id'])[0];
                if (!empty($quantity)){
                    $avg += $quantity['available_quantity'];
                }
                $x++;
            }
            $avg /= $x;
            if ($avg > $bigest['avg']){
                $bigest["shop_id"] = $shop['id'];
                $bigest["avg"] = $avg;
            }
        }
        return $bigest["shop_id"];
    }
}
