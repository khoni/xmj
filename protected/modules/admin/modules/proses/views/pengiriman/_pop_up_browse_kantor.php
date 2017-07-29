<div id="pop_up_browse_kantor" class="modal fade in" tabindex="-1" aria-hidden="false" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">List Kantor JMX <span style="font-size:12px;color:#CCCCCC" id="pilihan">-</span></h4>
            </div>
            <div class="modal-body">
            	<!-- konten -->
                <?php
				$cabang=new Cabang('korelasi_kantor');
				$cabang->unsetAttributes();  // clear any default values
				if(isset($_GET['Cabang']))
					$cabang->attributes=$_GET['Cabang'];		
				?>

				<?php $this->widget('booster.widgets.TbGridView',array(
                    'id'=>'kantor-grid',
                    'type' => 'hover condensed striped',
                    'dataProvider' => $cabang->korelasi_kantor(),
                    'filter' => $cabang,
                    'pager' => array(
                        'header' => '',
                        'htmlOptions' => array(
                            'class' => 'pagination'
                        )
                    ),
                    'columns'=>array(
                                array(
                            'header' => 'No.',
                            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                        ),    
                        [
                            'name' => 'nama_kantor_cabang',
                            'type' => 'raw',
                            //'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
                            'value' => function($data){
                                $idktr=empty($data->id_kantor_cabang) ? '-' : $data->id_kantor_cabang;
                                $ktr=empty($data->nama_kantor_cabang) ? '-' : $data->nama_kantor_cabang;
                                $kode=empty($data->kode_cabang) ? '' : '['.$data->kode_cabang.']';
                                $id=empty($data->cabangID) ? '' : $data->cabangID;
								$xid=$id;
								$yid="";
								$zid="";
                                $awalan_connote=empty($data->awalan_connote_cabang) ? '' : 'Awalan Connote : '.$data->awalan_connote_cabang;
                                $merge=$ktr." $kode <br /><small>$id<br />$idktr<br />$awalan_connote</small>";
								$onClick="onClick=\"set_kantor_induk('".$idktr."','$ktr $kode','$xid','$yid','$zid')\"";
								return $merge."<br /><a class='badge badge-roundless badge-danger' href='#' ".$onClick." data-dismiss='modal' aria-hidden='true' > Pilih </a> ";
                            },
                        ],			
                        [
                            'name' => 'nama_kantor_agensub',
                            'type' => 'raw',
                            //'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
                            'value' => function($data){
                                $idktr=empty($data->id_kantor_agensub) ? '-' : $data->id_kantor_agensub;
                                $ktr=empty($data->nama_kantor_agensub) ? '-' : $data->nama_kantor_agensub;
                                $kode=empty($data->kode_agensub) ? '' : '['.$data->kode_agensub.']';
                                $id=empty($data->agen_subID) ? '' : $data->agen_subID;
								$xid=$data->cabangID;
								$yid=$id;
								$zid="";
                                $awalan_connote=empty($data->awalan_connote_cabang) ? '' : 'Awalan Connote : '.$data->awalan_connote_cabang;
                                $merge=$ktr." $kode <br /><small>$id<br />$idktr<br />$awalan_connote</small>";
								$onClick="onClick=\"set_kantor_induk('".$idktr."','$ktr $kode','$xid','$yid','$zid')\"";
								return $merge."<br /><a class='badge badge-roundless badge-danger' href='#' ".$onClick." data-dismiss='modal' aria-hidden='true' > Pilih </a> ";
                            },
                        ],
                        [
                            'name' => 'nama_kantor_agen',
                            'type' => 'raw',
                            //'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
                            'value' => function($data){
                                $idktr=empty($data->id_kantor_agen) ? '-' : $data->id_kantor_agen;
                                $ktr=empty($data->nama_kantor_agen) ? '-' : $data->nama_kantor_agen;
                                $kode=empty($data->kode_agen) ? '' : '['.$data->kode_agen.']';
                                $id=empty($data->agenID) ? '' : $data->agenID;
								$xid=$data->cabangID;
								$yid=$data->agen_subID;
								$zid=$id;
                                $awalan_connote=empty($data->awalan_connote_cabang) ? '' : 'Awalan Connote : '.$data->awalan_connote_cabang;
                                $merge=$ktr." $kode <br /><small>$id<br />$idktr<br />$awalan_connote</small>";
								$onClick="onClick=\"set_kantor_induk('".$idktr."','$ktr $kode','$xid','$yid','$zid')\"";
								return $merge."<br /><a class='badge badge-roundless badge-danger' href='#' ".$onClick." data-dismiss='modal' aria-hidden='true' > Pilih </a> ";
                            },
                        ],
                
                    ),
                )); 
                ?>

            	<!-- end konten -->
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn default">Close</button>
                <!-- <button type="button" class="btn green">Save changes</button> -->
            </div>
        </div>
    </div>
</div>

<script>
function set_kantor_induk(kantorID,namaKantor,xid,yid,zid){
	var pilihan=$('#pilihan').html();
	if(pilihan=='origin'){
		$('#Pengiriman_origin_cabangID').val(xid);
		$('#Pengiriman_origin_agensubID').val(yid);
		$('#Pengiriman_origin_agenID').val(zid);
	
		$('#Pengiriman_origin_kantorID').val(kantorID);
		$('#Pengiriman_nama_kantor_pengirim').val(namaKantor);
		$('#div_kantor_origin').html(namaKantor);
	}else if(pilihan=='destination'){
		$('#Pengiriman_destination_kantorID').val(kantorID);
		$('#Pengiriman_nama_kantor_penerima').val(namaKantor);
		$('#div_kantor_penerima').html(namaKantor);		
	}else if(pilihan=='transit'){
		$('#Pengiriman_transit_kantorID').val(kantorID);
		$('#Pengiriman_nama_kantor_transit').val(namaKantor);
		$('#div_kantor_transit').html(namaKantor);		
	}
}
</script>