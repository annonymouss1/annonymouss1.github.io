		<div id="content" class="content">
			<!-- begin page-header -->
			<h1 class="page-header">Beranda Scheduler <small>Halaman Awal Aplikasi</small></h1>
			<!-- end page-header -->
			
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Dashboard</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						ON PROGRESS
<!-- 						<table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
							<thead>
							<tr>
								<th width="1%"></th>
								<th class="text-nowrap">Nomor Mobil</th>
								<th class="text-nowrap">Jenis Mobil</th>
								<th class="text-nowrap">Tanggal Habis Pajak</th>
								<th width="10%">Action</th>
							</tr>
							</thead>
							<tbody>
							<?php // $no = 1; foreach ($transport->result() as $row) { ?>
							<tr class="odd gradeX">
								<td width="1%"><?=$no++?></td>
								<td><?=$row->nomor_mobil?></td>
								<td><?=$row->jenis_mobil?></td>
								<td><?=date('d-M-Y',strtotime($row->tgl_pajak))?></td>
								<td>
									<button class="btn btn-warning btn-xs btn-edit" data-toggle="modal" data-target="modal-edit" data-id="<?=$row->id_transport?>"> 
										<i class="fas fa-edit" title="edit"></i>
									</button>
									<button class="btn btn-danger btn-xs btn-delete" data-toggle="modal" data-target="modal-edit" data-id="<?=$row->id_transport?>"> 
										<i class="fas fa-trash" title="edit"></i>
									</button>
								</td>
							</tr>
							<?php // } ?>
							</tbody>
						</table> -->
					</div>
				</div>
			</div>
			<!-- end panel -->
		</div>
