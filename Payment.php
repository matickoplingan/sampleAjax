<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

	var $titlename = "Wiramulti Platindo";
	var $appsname = "WMP";
	public function __construct() {
		parent::__construct();
		// Load form helper
		$this->load->helper('form');
		$this->load->library('table');
		$this->load->library('pagination');
	}

	public function index()
	{
		$this->showlist();
	}

//INQUIRY-module
	public function showlist()
	{
		$this->load->model('Userauthorization_model');
		$access_level = $this->Userauthorization_model->get_level();
		$user_verif = $access_level['userName'];
		$sub_submenu = "";
		$action_menux = 'cdts-ch-input';

		$data = array(
			'title' => $this->titlename,
			'access_level' => @$access_level,
			'nama_aplikasi' => $this->appsname,
			'nama_menu' => 'Daftar Pembayaran',
			'nama_submenu' => '<b>Daftar Seluruh Pembayaran.</b>',
			'nama_sub_submenu' => $sub_submenu,
			'active_app' => 'tv-payment',
			'active_menu_tree' => 'vapps-inquiry-payment',
			'active_menu' => 'vapps-inquiry-payment',
			'active_action' => $action_menux
			);

		$this->load->library('template');
		$this->template->loadx('default', 'payment_form/inquiry', $data);
	}
	
	function finddata(){
		$this->load->model('Payment_model');
		$datanya = json_decode($this->input->post('datanya'), TRUE);

		$aCariPO = $datanya["aCariPO"];
		$aCariSJ = $datanya["aCariSJ"];
		$aCariInv = $datanya["aCariInv"];
		$aCariCust = $datanya["aCariCust"];
		$aCariTglInvoice = $datanya["aCariTglInvoice"];

		$params = [
			"NO_PO" => $aCariPO,
			"NO_SJ" => $aCariSJ,
			"NO_INV" => $aCariInv,
			"NO_CUST" => $aCariCust,
			"NO_TGLINVOICE" => $aCariTglInvoice
		];

		$result = $this->Payment_model->inquiry($params);
		if ($result["responseCode"] == "00") {
			echo json_encode($result['responseData']);
		} else if ($result["responseCode"] == "401") {
		 $this->load->library('session');
		 $res = $this->session->sess_destroy();
		 $this->load->view('login');
		 return;
		}
	}
	
	function listPayment(){
		$datanya = $this->input->post('datanya');
		$this->load->model('ActualPayment_model');
		$param = [
			"NO_INV" => $datanya
		];
		$actpayment_result = $this->ActualPayment_model->inquiry($param);
		
		if($actpayment_result["responseCode"] == "00"){
				echo json_encode($actpayment_result['responseData']);
		} else if ($actpayment_result["responseCode"] == "401") {
			$this->load->library('session');
			$res = $this->session->sess_destroy();
			$this->load->view('login');
		} else {
			echo json_encode($actpayment_result);
		}
				
	}
	
	function checkLunas(){
		$datanya = $this->input->post('datanya');
		$this->load->model('ActualPayment_model');
		$param = [
			"PAY_NOINV" => $datanya
		];
		$actpayment_status_result = $this->ActualPayment_model->checkStatus($param);
		
		if ($actpayment_status_result["responseCode"] == "401") {
			$this->load->library('session');
			$res = $this->session->sess_destroy();
			$this->load->view('login');
		} else {
			echo json_encode($actpayment_status_result);
		}
				
	}
	
	function flagLunas(){
		$datanya = json_decode($this->input->post('datanya'), TRUE);
		$this->load->model('ActualPayment_model');
		$param = [
			"NO_INVOICE" 	=> $datanya["noInvoce"],
			"NO_PO" 		=> $datanya["noPO"],
			"STATUS" 		=> "paidoff"
		];
		$actpayment_status_result = $this->ActualPayment_model->flagLunas($param);
		
		if ($actpayment_status_result["responseCode"] == "401") {
			$this->load->library('session');
			$res = $this->session->sess_destroy();
			$this->load->view('login');
		} else {
			echo json_encode($actpayment_status_result);
		}
				
	}
	
	function detildata(){
		$noinvclicked = $this->input->post('category');
		$this->load->model('Userauthorization_model');
		$this->load->model('Salesorder_model');
		$this->load->model('Payment_model');

		$access_level = $this->Userauthorization_model->get_level();

		$user_verif = $access_level['userName'];
		$param = [
			"NO_INV" => $noinvclicked
		];
		$invdetil_result = $this->Payment_model->databyinv($param);
		
		if ($invdetil_result["responseCode"] == "00" ){
			$nopo = $invdetil_result['responseData'][0]['noPo']['String'];
			$po_result = $this->Salesorder_model->show_all($nopo);
			
			if ($po_result["responseCode"] == "00" ){
				$po_data = $po_result["responseData"];
				$po_no = $po_data["poNumber"];
				$param = [
					"NO_PO" => $po_no
				];
				$po_detil_result = $this->Salesorder_model->getPoDetilByPONO($param);
				$po_detil_data = $po_detil_result["responseData"];
				
				/*$param = [
					"NO_INV" => $noinvclicked
				];
				$actpayment_result = $this->ActualPayment_model->inquiry($param);
				*/
				
				$data = array(
					'po_data' => $po_data,
					'po_detil_data' => $po_detil_data,
					//'actpayment_data' => $actpayment_result["responseData"],
					//'product_lists' => $product_lists["responseData"],
					//'penjualanbatch_data' => $penjualanbatch_data,
					//'suratjalan_data' => $suratjalan_data,
					'invoice_data' => $invdetil_result['responseData']
					);

				$this->load->view('payment_form/data_detil.php',$data);
			} else if ($invdetil_result["responseCode"] == "401") {
				$this->load->library('session');
				$res = $this->session->sess_destroy();
				$this->load->view('login');
				return;
			}
		}
	}
	
	public function manage($action="update")
	{
		$this->load->model('ActualPayment_model');
		$this->load->model('Userauthorization_model');
		$access_level = $this->Userauthorization_model->get_level();
		$user_verif = $access_level['userName'];


		if ($action=="update"){
			
		};

		if ($action=="add"){
			$datanya = json_decode($this->input->post('datanya'), TRUE);
			$varTglBayar = date("Y-m-d", strtotime($datanya["paymentTanggalPembayaran"]));
			$varRemark = $datanya["paymentRemark"];
			$varInvoice = $datanya["paymentInvoice"];
			$varAmount = $datanya["paymentAmount"];

			$params = [
				"PAY_NOINV" => $varInvoice,
				"PAY_DATE" => $varTglBayar,
				"PAY_REMARK" => $varRemark,
				"PAY_AMT" => $varAmount,
			];

			$returns = $this->ActualPayment_model->add($params);
			
			if($returns["responseCode"] == "00"){
					echo json_encode($returns);
			} else if ($returns["responseCode"] == "401") {
				$this->load->library('session');
				$res = $this->session->sess_destroy();
				$this->load->view('login');
			} else {
				echo json_encode($returns);
			}

		};

		if ($action=="del"){
			$id = $this->input->post('delAgenid');
			$this->Owner_model->del_listkurir($id);
			$this->Owner_model->log_activity("Delete Kurir ID : ".$id,"DK_DEL","Success",$user_verif);
		};

		//redirect('welcome');
	}
}