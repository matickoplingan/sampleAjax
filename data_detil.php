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