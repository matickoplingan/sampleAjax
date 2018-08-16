# sampleAjax

# View nya

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab"><b>Order</b></a></li>
          <li><a href="#tab_inv" class="triggerinv" data-toggle="tab"><b>Invoice</b></a></li>
		  <li><a href="#tab_payment" class="triggerinv" data-toggle="tab" id="bayarTab"><b>Pembayaran</b></a></li>
		  <li><a href="#tab_dopayment" class="triggerinv" data-toggle="tab" id="doBayarTab"><b>Tambah Pembayaran</b></a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <div class="box-body">
              <div class="row">
                <form role="form" method="POST" id="form_add_proses" name="form_add_proses">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nomor Purchase Order</label>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-envelope">
                          </i>
                        </span>
                        <input id="poNumber" name="poNumber" type="text" class="form-control" disabled value="<?php echo $po_data["poNumber"];?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Customer</label>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa  fa-user">
                          </i>
                        </span>
                        <input id="poNumber" name="poNumber" type="text" class="form-control" disabled value="<?php echo $po_data["custID"];?>">
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal PO</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>

                        <input id="poTanggal" name="poTanggal" type="text"
                        class="form-control pull-right"  disabled value="<?php echo $po_data["tanggalPo"];?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Tanggal PO Datang</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>

                        <input id="poTanggalDatang" name="poTanggalDatang" type="text"
                        class="form-control pull-right" disabled value="<?php echo $po_data["tanggalDatang"];?>">
                      </div>
                    </div>

                  </div>
                  <!-- /.box-body -->
                  <div class="form-group">
                  <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Category</th>
                          <th>Thickness</th>
                          <th>Width</th>
                          <th>Length</th>
                          <th>Quantity</th>
                          <th>Harga</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php for ($i = 0; $i < count($po_detil_data); ++$i) { ?>
                        <tr>
                          <td>
                            <?php echo $po_detil_data[$i]['namaBarang']; ?>
                          </td>
                          <td>
                            <?php echo $po_detil_data[$i]['thickness']; ?>
                          </td>
                          <td>
                            <?php echo $po_detil_data[$i]['widthBrg']; ?>
                          </td>
                          <td>
                            <?php echo $po_detil_data[$i]['lengthBrg']; ?>
                          </td>
                          <td>
                            <?php echo $po_detil_data[$i]['qty']; ?>
                          </td>
                          <td>
                            <?php echo $po_detil_data[$i]['harga']; ?>
                          </td>
                        </tr>
                        <?php }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-primary" id="buttonAdd">Add</button> -->
              </div>

            </div>
          </div>
           <div class="tab-pane" id="tab_inv">
             <div class="box-body">
               <div class="row">
                 <div class="box-body">
                   <div class="form-group">
                   <div class="box-body">
                     <table id="example2" class="table table-bordered table-hover">
                       <thead>
                         <tr>
                           <th>Nomor Invoice</th>
                           <th>Category Product</th>
                           <th>Qty</th>
						   <th>Harga</th>
						   <th>Total Harga</th>
                         </tr>
                       </thead>
                       <tbody>
                         <?php if($invoice_data){
							 
                           for ($i = 0; $i < count($invoice_data); ++$i) { ?>
                         <tr>
                           <td>
                             <?php echo $invoice_data[$i]['noInvoice']['String']; ?>
                           </td>
                           <td>
                             <?php echo $invoice_data[$i]['categoryName']['String'].'  '.$invoice_data[$i]['thickness'].' x '.$invoice_data[$i]['widthBrg'].' x '.$invoice_data[$i]['lengthBrg']; ?>
                           </td>
                           <td>
                             <?php echo $invoice_data[$i]['qty']; ?>
                           </td>
						   <td>
                             <?php echo $invoice_data[$i]['harga']; ?>
                           </td>
						   <td>
                             <?php 
							 $hargaTotal = $invoice_data[$i]['qty'] * $invoice_data[$i]['harga'];
							 echo $hargaTotal; 
							 ?>
                           </td>
                         </tr>
                       <?php }}?>
                       </tbody>
                     </table>
                   </div>
                 </div>
                 </div>
                 </div>
              </div>
            </div>
			<div class="tab-pane" id="tab_payment">
             <div class="box-body">
               <div class="row">
                 <div class="box-body">
                   <div class="form-group">
                   <div class="box-body">
                     <table id="example2" class="table table-bordered table-hover">
                       <thead>
                         <tr>
                           <th>Amount</th>
                           <th>Date</th>
                           <th>Remark</th>
						   <th>Registered By</th>
                         </tr>
                       </thead>
						<tbody id="bodyDetilPayment">

						</tbody>
                     </table>
                   </div>
                 </div>
                 </div>
                 </div>
              </div>
            </div>
			<div class="tab-pane" id="tab_dopayment">
             <div class="box-body">
               <div class="row">
                 <div class="box-body">
				   <div class="form-group">
                        <label>Jumlah dibayar</label>
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-envelope">
                            </i>
                          </span>
                        <input id="paymentAmount" name="paymentAmount" type="number" class="form-control">
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label>Remark</label>
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-envelope">
                            </i>
                          </span>
                        <input id="paymentRemark" name="paymentRemark" type="text" class="form-control">
                        </div>
                      </div>
					  
					  <div class="form-group">
						<label>Tanggal Pembayaran</label>
						<div class="input-group">
						  <span class="input-group-addon">
							<i class="fa fa-mortar-board">
							</i>
						  </span>
						<input id="paymentTanggalPembayaran" name="paymentTanggalPembayaran" type="text" class="form-control" style="text-transform:uppercase" readonly>
						</div>
					  </div>
				   <div class="modal-footer">\
						<input class="btn btn-success" id="btnFlagLunas" name="btnFlagLunas" type="button" value="Lunas"/>
						<input class="btn btn-info" id="btnProsesPembayaran" name="btnProsesPembayaran" type="button" value="Tambah Pembayaran" disabled/>
					  
					</div>
                 </div>
                 </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
$('a[data-toggle=tab]').click(function(){
    if(this.id == 'bayarTab'){
		$.ajax({
			url: '<?php echo site_url('payment/listPayment') ?>',
			type: 'POST',
			dataType:"json",
			data: "datanya=<?php echo $invoice_data[0]['noInvoice']['String'];?>",
			success: function(row) {

			  if (JSON.stringify(row) == "[]"){
					$("#bodyDetilPayment").empty();
			  } else {
				$("#bodyDetilPayment").empty();
				for (i = 0; i < row.length; i++) {
					//text += cars[i] + "<br>";
					var markup = "<tr><td>" + $.trim(JSON.stringify(row[i]["payAmnt"]["String"]).replace(/\"/g,""))
					+ "</td><td>" + $.trim(JSON.stringify(row[i]["dtePayment"]["String"]).replace(/\"/g,""))
					+ "</td><td>" + $.trim(JSON.stringify(row[i]["payRemark"]["String"]).replace(/\"/g,""))
					+ "</td><td>" + $.trim(JSON.stringify(row[i]["regBy"]["String"]).replace(/\"/g,""))
					+ "</td></tr>";
					$("#bodyDetilPayment").append(markup);
				}
			  }
			}
		  });
	} 
	if (this.id == 'doBayarTab'){
		$.ajax({
			url: '<?php echo site_url('payment/checkLunas') ?>',
			type: 'POST',
			dataType:"json",
			data: "datanya=<?php echo $invoice_data[0]['noInvoice']['String'];?>",
			success: function(row) {
			  if (JSON.stringify(row["responseCode"]).replace(/\"/g,"") == "00"){
				  document.getElementById("paymentRemark").disabled = true;
				  document.getElementById("paymentAmount").disabled = true;
				  document.getElementById("paymentTanggalPembayaran").disabled = true;
				  document.getElementById("btnProsesPembayaran").disabled = true;
				  document.getElementById("btnFlagLunas").disabled = false;
				  
				  alert(JSON.stringify(row["responseMessage"]).replace(/\"/g,""));
			  } else if (JSON.stringify(row["responseCode"]).replace(/\"/g,"") == "02"){
				  document.getElementById("paymentRemark").disabled = false;
				  document.getElementById("paymentAmount").disabled = false;
				  document.getElementById("paymentTanggalPembayaran").disabled = false;
				  document.getElementById("btnProsesPembayaran").disabled = false;
				  document.getElementById("btnFlagLunas").disabled = true;
			  } else if (JSON.stringify(row["responseCode"]).replace(/\"/g,"") == "03"){
				  document.getElementById("paymentRemark").disabled = true;
				  document.getElementById("paymentAmount").disabled = true;
				  document.getElementById("paymentTanggalPembayaran").disabled = true;
				  document.getElementById("btnProsesPembayaran").disabled = true;
				  document.getElementById("btnFlagLunas").disabled = true;
			  }
			  
			}
		  });
	}
});

$(function () {
    $('#btnProsesPembayaran').click(function () {
      var paymentTanggalPembayaran 	= $("#paymentTanggalPembayaran").val();
      var paymentRemark 			= $("#paymentRemark").val();
      var paymentAmount 			= $("#paymentAmount").val();
	  
      data = {};
      data.paymentTanggalPembayaran = paymentTanggalPembayaran;
      data.paymentRemark = paymentRemark;
      data.paymentAmount = paymentAmount;
	  data.paymentInvoice = '<?php echo $invoice_data[0]['noInvoice']['String'];?>';

      $.ajax({
        url: '<?php echo site_url('payment/manage/add') ?>',
        type: 'POST',
        dataType:"json",
        data: 'datanya='+JSON.stringify(data),
      }).success(function(row) {
		  if (JSON.stringify(row["responseCode"]).replace(/\"/g,"") == "00"){
			  alert(JSON.stringify(row["responseMessage"]).replace(/\"/g,""));
			  
			  if(JSON.stringify(row["responseSisa"]).replace(/\"/g,"") == "0"){
				  document.getElementById("paymentRemark").disabled = true;
				  document.getElementById("paymentAmount").disabled = true;
				  document.getElementById("paymentTanggalPembayaran").disabled = true;
				  document.getElementById("btnProsesPembayaran").disabled = true;
				  document.getElementById("btnFlagLunas").disabled = false;
			  }
			  
		  } else {
			alert(JSON.stringify(row["responseMessage"]).replace(/\"/g,""));
			document.getElementById("paymentRemark").disabled = false;
			document.getElementById("paymentAmount").disabled = false;
			document.getElementById("paymentTanggalPembayaran").disabled = false;
			document.getElementById("btnFlagLunas").disabled = true;
		  }
          
      })
    });
	
	$('#btnFlagLunas').click(function () {
		data = {};
        data.noInvoce = '<?php echo $invoice_data[0]['noInvoice']['String'];?>';
        data.noPO = '<?php echo $po_data["poNumber"];?>';
      $.ajax({
        url: '<?php echo site_url('payment/flagLunas') ?>',
        type: 'POST',
        dataType:"json",
        data: 'datanya='+JSON.stringify(data),
      }).success(function(row) {
		  if (JSON.stringify(row["responseCode"]).replace(/\"/g,"") == "00"){
			alert(JSON.stringify(row["responseMessage"]).replace(/\"/g,""));
			  
			document.getElementById("paymentRemark").disabled = true;
			document.getElementById("paymentAmount").disabled = true;
			document.getElementById("paymentTanggalPembayaran").disabled = true;
			document.getElementById("btnProsesPembayaran").disabled = true;
			document.getElementById("btnFlagLunas").disabled = true;
			  
		  } else {
			alert(JSON.stringify(row["responseMessage"]).replace(/\"/g,""));
			document.getElementById("paymentRemark").disabled = false;
			document.getElementById("paymentAmount").disabled = false;
			document.getElementById("paymentTanggalPembayaran").disabled = false;
			document.getElementById("btnFlagLunas").disabled = false;
		  }
          
      })
    });
})

$(function() {
  //Date picker
  $('#paymentTanggalPembayaran').datepicker({
    autoclose: true
  })
})
</script>



# Controller
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
