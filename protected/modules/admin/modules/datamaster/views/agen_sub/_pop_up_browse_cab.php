<div id="pop_up_browse_cab" class="modal fade in" tabindex="-1" aria-hidden="false" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Information</h4>
            </div>
            <div class="modal-body">
            	<!-- konten -->
                <?php
                $cabang=new Cabang('search');
                $cabang->unsetAttributes();  // clear any default values
                if(isset($_GET['Cabang']))
                    $cabang->attributes=$_GET['Cabang'];
				?>

				<?php $this->widget('booster.widgets.TbGridView',array(
                    'id'=>'cabang-grid',
                    'type' => 'hover condensed striped',
                    'dataProvider' => $cabang->search(),
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
                            'name' => 'cabangID',
                            'type' => 'raw',
                            'value' => function($data){
								$ktr=empty($data->kantor->nama_kantor) ? '-' : $data->kantor->nama_kantor;
                                $kode=empty($data->kantor->kode) ? '-' : $data->kantor->kode;
								return (empty($data->cabangID) ? '-' : $data->cabangID)."<br /><a class='badge badge-roundless badge-danger' href='#' onClick=\"set_kantor_induk('".$data->cabangID."','$ktr','$kode')\" data-dismiss='modal' aria-hidden='true' >Pilih </a> ";
                                //return empty($data->cabangID) ? '-' : $data->cabangID;
                            },
                        ],		
                        
                        [
                            'name' => 'kode',
                            'type' => 'raw',
                            'value' => function($data){
                                return empty($data->kantor->kode) ? '-' : $data->kantor->kode;
                            },
                        ],		
                        [
                            'name' => 'nama_kantor',
                            'header' => 'Nama Kantor Cabang',
                            'type' => 'raw',
                            'value' => function($data){
								$ktr=empty($data->kantor->nama_kantor) ? '-' : $data->kantor->nama_kantor;
                                $nama=empty($data->kantor->user->nama) ? '-' : $data->kantor->user->nama;
                                $email=empty($data->kantor->user->email) ? '-' : $data->kantor->user->email;
                                $userid=empty($data->kantor->user->userID) ? '-' : $data->kantor->user->userID;
                                return "$ktr<br /> <small style='font-size:10px;color:#999999'><b>$nama</b><br />Email : $email<br />User ID : $userid</small>";
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
function set_kantor_induk(cabangID,namaKantor,kodeKantor){
	$('#Kantor_cabangID').val(cabangID);
	$('#User_cabangID').val(cabangID);
	$('#div_kantor').html('Nama Kantor : ' + namaKantor + '<br />Kode Cabang : ' + kodeKantor);
}
</script>