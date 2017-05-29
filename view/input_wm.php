
<fieldset>
    <legend>Transaksi Pencatatan Water Meter</legend>
    <div class="row">
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Input Water Meter
                </div>
                <form name="frm_iwm" id="frm_iwm">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="id_Pel" class="control-label">Id. Pel/Blok</label>
                            <input type="hidden" name="id_Pel">
                            <input type="text" name="list_pel" id="list_pel" class="input-sm form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama_pemilik" class="control-label">Nama Pelanggan</label>
                            <input type="text" name="nama_pemilik" id="nama_pemilik" class="input-sm form-control" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="date_iwm" class="control-label">Tanggal Input WM</label>
                            <input type="text" name="date_iwm" id="date_iwm" class="input-sm form-control" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="iwm" class="control-label">Water Meter</label>
                            <input type="text" name="iwm" id="iwm" class="input-sm form-control">
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="text-right">
                            <button type="submit" id="btn_add" class="btn btn-sm btn-primary">Save</button>
                        </div>                    
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-9 hidden-sm hidden-xs hidden-operator">
            <table id="tbl_iwm" style="display: none"></table>
        </div>
    </div>
</fieldset>

<script src="application/input_wm/script.js"></script>