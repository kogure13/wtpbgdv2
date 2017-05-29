
<fieldset>
    <legend>Data Pelanggan</legend>    
    <table id="tbl_pelanggan" style="display: none;"></table>

    <div id="add_model" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <form id="frm_pelanggan">
                    <div class="modal-body">
                        <input type="hidden" value="add" name="action" id="action">
                        <input type="hidden" value="0" name="edit_id" id="edit_id">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="idpel" class="control-label">ID Pelanggan:</label>
                                    <input type="text" class="form-control input-sm" id="id_Pel" name="id_Pel" readonly="readonly"/>
                                </div>
                                <div class="col-sm-6">
                                    <label for="namapemilik" class="control-label">Nama Lengkap:</label>
                                    <input type="text" class="form-control input-sm" id="nama_pemilik" name="nama_pemilik"/>
                                </div>
                            </div>                            
                        </div>                                                
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label for="area" class="control-label">Area</label>
                                    <input type="hidden" id="areaname_id" name="areaname_id">
                                    <input type="text" class="form-control input-sm" id="areaname" name="areaname" readonly="readonly" >
                                </div>
                                <div class="col-sm-3">
                                    <label for="blok" class="control-label">Blok</label>
                                    <select name="blok" class="form-control input-sm" id="blok" name="blok">
                                        <option value="0">...</option>                                        
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="kav" class="control-label">Kav</label>
                                    <input type="text" class="form-control input-sm" id="kav" name="kav" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="keterangan" class="control-label">Keterangan:</label>
                                    <textarea class="form-control input-sm" id="keterangan" name="keterangan"></textarea>                                    
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn_cancel" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="btn_add" class="btn btn-sm btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>        
</fieldset>

<script src="application/pelanggan/script.js"></script>
