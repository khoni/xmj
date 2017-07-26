<div id="pop_up_agensub" class="modal fade in" tabindex="-1" aria-hidden="false" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Information</h4>
            </div>
            <div class="modal-body">
            	<!-- konten -->
                <div class="note note-success">
                    <h4 class="block">Pengguna sudah terdaftar<br><small style="color:#999999">Bilamana pengguna sudah terdaftar di sistem dan ingin ditambahkan ke data kantor cabang.</small></h4>
                    <p>
                         Masukkan ID pengguna untuk menambahkan Sub Agen.<br>
                         <form action="/admin/datamaster/agen_sub/addkantor" action="get">
                         	<div class="row">
                                <div class="col-md-8"><input type="text" name="userid" value="" class="form-control" placeholder='ID Pengguna' /> &nbsp; </div>
                                <div class="col-md-4"><input type="submit" name="submit" value="Cek" class="form-control btn btn-info" /></div>
                            </div>
                         </form>
                    </p>
                </div>
                <div class="note note-warning">
                    <h4 class="block">Pengguna Baru (Untuk Sub Agen)<br><small style="color:#999999">Bilamana pengguna belum terdaftar di sistem</small></h4>
                    <p><?= CHtml::link('Klik Disini untuk mendaftarkan pengguna baru (Untuk Sub Agen)',array('create')) ?></p>
                </div>
            	<!-- end konten -->
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn default">Close</button>
                <!-- <button type="button" class="btn green">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
