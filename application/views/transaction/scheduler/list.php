		<div id="content" class="content">
			<!-- begin page-header -->
			<h1 class="page-header">Master Schedule <small>Halaman Permintaan Schedule</small></h1>
			<!-- end page-header -->
			
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">
						Data Schedule
						<?php if ($this->session->userdata('hak_akses') == "user") { ?>
							<button type="button" data-toggle="modal" data-target="#tambah-schedule" class="btn btn-primary btn-xs"><h5>+ Schedule</h5></button>
						<?php } ?>
					</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
							<thead>
							<tr>
								<th width="1%"></th>
								<th class="">Hari</th>
								<th class="text-nowrap">Tanggal</th>
								<th class="text-nowrap">Customer</th>
								<th class="text-nowrap">Limbah</th>
								<th class="text-nowrap">Jenis Limbah</th>
								<th class="text-nowrap">Nomor Mobil</th>
								<th class="text-nowrap">Driver</th>
								<th class="text-nowrap">Tujuan</th>
								<th width="10%">Status</th>
							</tr>
							</thead>
							<tbody>
							<?php 
								$no = 1; 
								// exit(var_dump($this->session->userdata()));
								foreach ($schedule->result() as $row) { 
								if ($row->status_angkut == 0) {
									if ($this->session->userdata('hak_akses') == "Manajemen") {
										$status =  '<button class="btn btn-warning btn-xs btn-approve" data-toggle="modal" data-target="#approval" data-id="'.$row->id_transaksi.'"> REQUESTED</button>';
									}else{
										$status =  '<button class="btn btn-warning btn-xs"> ON REQUEST</button>';
									}
								}else if ($row->status_angkut == 1) {
									if ($this->session->userdata('hak_akses') == "Manajemen") {
										$status =  '<button class="btn btn-primary btn-xs btn-detail" data-toggle="modal" data-target="#detail-schedule" data-id="'.$row->id_transaksi.'"> GET DETAIL</button>';
									}else{
										$status = '<button class="btn btn-success btn-xs"> ON SCHEDULE</button>';
									}
								}else if($row->status_angkut == 2){
									$status = '<button class="btn btn-danger btn-xs"> REJECTED</button>';
								}else if($row->status_angkut == 3){
									$status = '<button class="btn btn-success btn-xs">READY <i class="fa fa-check" disabled></i></button>';
								}
							?>
							<tr class="odd gradeX">
								<td width="1%"><?=$no++?></td>
								<td><?=date('l',strtotime($row->tgl_request))?></td>
								<td><?=date('d-M-Y',strtotime($row->tgl_request))?></td>
								<td><?=$row->customer?></td>
								<td><?=$row->kode_limbah?></td>
								<td><?=$row->jenis_limbah?></td>
								<td><?=$row->no_mobil?></td>
								<td><?=$row->driver?></td>
								<td><?=$row->tujuan_awal?></td>
								<td><?=$status?></td>
							</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- end panel -->
		</div>

        <!-- #modal-dialog -->
        <div class="modal fade" id="tambah-schedule">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Request Schedule</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form action="<?=base_url('index.php/C_Transaction/add_schedule')?>" method="post">
                        <div class="modal-body">
                            <div class="form-group row">
								<label class="col-lg-4 col-form-label"><h5>Perusahaan</h5></label>
								<div class="col-lg-8">
									<select class="js-example-basic-single form-control" name="customer">
											<option value=""></option>
										<?php foreach ($perusahaan->result() as $dt_perusahaan) { ?>
											<option value="<?=$dt_perusahaan->nama_perusahaan?>"><?=$dt_perusahaan->nama_perusahaan?></option>
										<?php } ?>
									</select>
								</div>
                        	</div>
                            <div class="form-group row">
								<label class="col-lg-4 col-form-label"><h5>Limbah</h5></label>
								<div class="col-lg-8">
									<select class="js-example-basic-single form-control" name="limbah">
											<option value=""></option>
										<?php foreach ($limbah->result() as $dt_limbah) { ?>
											<option value="<?=$dt_limbah->kode?>"><?=$dt_limbah->kode." - ".$dt_limbah->jenis_limbah?></option>
										<?php } ?>
									</select>
								</div>
                        	</div>
                            <div class="form-group row">
								<label class="col-lg-4 col-form-label"><h5>Tanggal Pengangkutan</h5></label>
								<div class="col-lg-8">
									<input type="date" name="tgl_request" class="form-control">
								</div>
                        	</div>
                            <div class="form-group row">
								<label class="col-lg-4 col-form-label"><h5>Tujuan</h5></label>
								<div class="col-lg-8">
									<input type="text" name="tujuan" class="form-control">
								</div>
                        	</div>
                            <div class="form-group row">
								<label class="col-lg-4 col-form-label"><h5>Qty Plan Limbah</h5></label>
								<div class="col-lg-8">
									<input type="number" step="0.01" name="qty_plan" class="form-control">
								</div>
                        	</div>
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                            <button type="submit"  class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- #modal-dialog -->
        <div class="modal fade" id="approval">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Approval Schedule</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                    	<div class="col-md-12">
                			<div id="data-schedule"></div>
                    	</div>
                    	<hr>
                    	<h3 class="text-center">Apakah Anda Menyetujui Request Ini ? </h3>
                    </div>
                    <div class="modal-footer">
                    	<p id="btn-penyetujuan"></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- #modal-dialog -->
        <div class="modal fade" id="detail-schedule">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Pelengkapan Detail Schedule</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form action="<?=base_url('index.php/C_Transaction/add_detail_schedule')?>" method="post">
                        <div class="modal-body">
                            <div class="form-group row">
								<label class="col-lg-4 col-form-label"><h5>Driver</h5></label>
								<div class="col-lg-8">
									<select class="js-example-basic-single form-control" name="driver">
											<option value=""></option>
										<?php foreach ($driver->result() as $dt_driver) { ?>
											<option value="<?=$dt_driver->nik_driver?>"><?=$dt_driver->nama_driver?></option>
										<?php } ?>
									</select>
								</div>
                        	</div>
                            <div class="form-group row">
								<label class="col-lg-4 col-form-label"><h5>Kendaraan</h5></label>
								<div class="col-lg-8">
									<select class="js-example-basic-single form-control" name="no_mobil">
											<option value=""></option>
										<?php foreach ($transport->result() as $dt_transport) { ?>
											<option value="<?=$dt_transport->nomor_mobil?>"><?=$dt_transport->jenis_mobil." - ".$dt_transport->nomor_mobil?></option>
										<?php } ?>
									</select>
								</div>
                        	</div>
<!--                             <div class="form-group row">
								<label class="col-lg-4 col-form-label"><h5>Tanggal Pengangkutan</h5></label>
								<div class="col-lg-8">
									<input type="date" name="tgl_angkut" class="form-control">
								</div>
                        	</div> -->
                            <div class="form-group row">
								<label class="col-lg-4 col-form-label"><h5>Tujuan</h5></label>
								<div class="col-lg-8">
									<input type="text" name="tujuan" class="form-control">
								</div>
                        	</div>
                            <div class="form-group row">
								<label class="col-lg-4 col-form-label"><h5>Qty Actual Limbah</h5></label>
								<div class="col-lg-8">
									<input type="number" step="0.01" name="qty_actual" class="form-control">
									<input type="hidden" id="id_transaksi_detail" name="id_transaksi" value="">
								</div>
                        	</div>
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                            <button type="submit"  class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

	<script src="<?=base_url('assets')?>/js/app.min.js"></script>
	<script src="<?=base_url('assets')?>/js/theme/apple.min.js"></script>

<script type="text/javascript">

    $(document).ready(function() {
        $(".btn-approve").on('click',function() {
        	var id_transaksi = $(this).attr('data-id');
            $.ajax({
              type: 'POST',
              url : "<?=base_url('index.php/C_Transaction/get_transaction_ajax')?>",
              data: {id_transaksi : id_transaksi},
              cache : false,
              success : function(data){
        	console.log(data)
                var obj =JSON.parse(data);
            	var html = '';
            	var btn = '';
            	html += '<div class="row">';
            	html += '<div class="col-md-4">';
            	html += '<span><h5>Customer : </h5></span>';
            	html += '</div>';
            	html += '<div class="col-md-8">';
            	html += '<span><h6>'+obj.nama_perusahaan+'</h6></span>';
            	html += '</div>';
            	html += '<div class="col-md-4">';
            	html += '<span><h5>Limbah : </h5></span>';
            	html += '</div>';
            	html += '<div class="col-md-8">';
            	html += '<span><h6>'+obj.limbah+'</h6></span>';
            	html += '</div>';
            	html += '<div class="col-md-4">';
            	html += '<span><h5>Qty Plan : </h5></span>';
            	html += '</div>';
            	html += '<div class="col-md-8">';
            	html += '<span><h6>'+obj.qty_plan+' TON</h6></span>';
            	html += '</div>';
            	html += '<div class="col-md-4">';
            	html += '<span><h5>Hari, Tanggal : </h5></span>';
            	html += '</div>';
            	html += '<div class="col-md-8">';
            	html += '<span><h6>'+obj.hari+', '+obj.tanggal+'</h6></span>';
            	html += '</div>';
            	html += '</div>';

            	// btn += '<button class="btn btn-primary btn-penyetujuan" data-penyetujuan="setuju" data-id="'+obj.id_transaksi+'" >Approve</button>';
            	// btn += '&nbsp;&nbsp;&nbsp;';
            	// btn += '<button class="btn btn-danger btn-penyetujuan" data-penyetujuan="tolak" data-id="'+obj.id_transaksi+'" >Reject</button>';
            	btn += '<button class="btn btn-primary btn-penyetujuan" onclick="approval('+obj.id_transaksi+', \'setuju\')" >Approve</button>';
            	btn += '&nbsp;&nbsp;&nbsp;';
            	btn += '<button class="btn btn-danger btn-penyetujuan" onclick="approval('+obj.id_transaksi+', \'tolak\')" >Reject</button>';
            	$('#data-schedule').html(html);
            	$('#btn-penyetujuan').html(btn)
              }
            });
        });

    	$(".btn-penyetujuan").on('click',function(){
        	var id_transaksi = $(this).attr('data-id');
        	var penyetujuan  = $(this).attr('.data-approve');
	
			console.log(id_transaksi);

            $.ajax({
              type: 'POST',
              url : "<?=base_url('index.php/C_Transaction/approval')?>",
              data: {id_transaksi : id_transaksi, penyetujuan : penyetujuan},
              cache : false,
              success : function(data){

              }
          	});
    	});

    	$('.btn-detail').on('click',function(){
        	var id_transaksi = $(this).attr('data-id');
            $.ajax({
              type: 'POST',
              url : "<?=base_url('index.php/C_Transaction/get_transaction_ajax')?>",
              data: {id_transaksi : id_transaksi},
              cache : false,
              success : function(data){
                console.log(data)
                var obj =JSON.parse(data);
                $('#id_transaksi_detail').val(obj.id_transaksi);
              }
          	});
    	});
    });	

    function approval(id_transaksi,penyetujuan)
    {
		console.log(id_transaksi,penyetujuan);

	    $.ajax({
	      type: 'POST',
	      url : "<?=base_url('index.php/C_Transaction/approval')?>",
	      data: {id_transaksi : id_transaksi, penyetujuan : penyetujuan},
	      cache : false,
	      success : function(response){
	      	$('#approval').modal('hide');
	      	console.log(response)
	      	if (response == "approve") {
				alert ('Data Berhasil Di Approve');
				window.location="<?=base_url('index.php/C_Transaction/scheduler')?>";
	      	}else if (response == "reject") {
				alert ('Data Berhasil Di Reject');
				window.location="<?=base_url('index.php/C_Transaction/scheduler')?>";
	      	}else if (response == "gagal") {
				alert ('Terjadi Kesalahan Penyimpanan Data');
				window.location="<?=base_url('index.php/C_Transaction/scheduler')?>";
	      	}
	      }
	  	});
    }
</script>