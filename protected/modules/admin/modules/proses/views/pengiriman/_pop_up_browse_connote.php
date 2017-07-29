<div id="pop_up_browse_connote" class="modal fade in" tabindex="-1" aria-hidden="false" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Nomer Connote Cabang</h4>
            </div>
            <div class="modal-body">
            	<!-- konten -->
                <?php
				$model=new Connote('search');
				$model->unsetAttributes();  // clear any default values
		
				if(isset($_GET['Connote']))
					$model->attributes=$_GET['Connote'];
		
				?>
                
				<?php $this->widget('booster.widgets.TbGridView',array(
                    'id'=>'connote-grid',
                    'type' => 'hover condensed striped',
                    'dataProvider' => $model->search(),
                    'filter' => $model,
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
                            'name' => 'nama_kantor',
                            'type' => 'raw',
                            'value' => function($data){
                                return empty($data->kantor->fullnama) ? '-' : $data->kantor->fullnama;
                            },
                        ],		
                        'name' => 'nomer',
                        [
                            'header' => '&nbsp;',
                            'type' => 'raw',
                            'value' => function($data){
								$onClick="onClick=\"ambil_nomer_connote('".$data->connoteID."','".$data->nomer."','".$data->kantor->fullnama."')\"";
								return "<a class='badge badge-roundless badge-danger' href='#' ".$onClick." data-dismiss='modal' aria-hidden='true' > Pilih </a> ";
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
function ambil_nomer_connote(id,nomer,nama_kantor){
	$('#Pengiriman_connoteID').val(id);
	$('#Pengiriman_nomer_connote').val(nomer);
	$('#div_nomer_connote').html(nomer + " &nbsp; <i class='fa fa-hand-o-right'></i> &nbsp; " + nama_kantor);
}
</script>