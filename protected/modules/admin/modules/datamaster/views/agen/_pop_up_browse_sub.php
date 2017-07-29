<div id="pop_up_browse_sub" class="modal fade in" tabindex="-1" aria-hidden="false" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Information</h4>
            </div>
            <div class="modal-body">
            	<!-- konten -->
                <?php
                $sub=new AgenSub('search');
                $sub->unsetAttributes();  // clear any default values
                if(isset($_GET['AgenSub']))
                    $sub->attributes=$_GET['AgenSub'];
				?>

				<?php $this->widget('booster.widgets.TbGridView',array(
                    'id'=>'cabang-grid',
                    'type' => 'hover condensed striped',
                    'dataProvider' => $sub->search(),
                    'filter' => $sub,
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
                            'name' => 'agen_subID',
                            'type' => 'raw',
                            'value' => function($data){
								$ktr=empty($data->kantor->nama_kantor) ? '-' : $data->kantor->nama_kantor;
                                $kode=empty($data->kantor->kode) ? '-' : $data->kantor->kode;
								return (empty($data->agen_subID) ? '-' : $data->agen_subID)."<br /><a class='badge badge-roundless badge-danger' href='#' onClick=\"set_kantor_induk('".$data->agen_subID."','$ktr','$kode')\" data-dismiss='modal' aria-hidden='true' >Pilih </a> ";
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
                            'header' => 'Nama Kantor Sub Agen',
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
function set_kantor_induk(agen_subID,namaKantor,kodeKantor){
	$('#Kantor_agen_subID').val(agen_subID);
	$('#User_agen_subID').val(agen_subID);
	$('#div_kantor').html('Nama Kantor : ' + namaKantor + '<br />Kode Sub Agen : ' + kodeKantor);
}
</script>