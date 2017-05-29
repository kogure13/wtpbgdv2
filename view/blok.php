
<fieldset>
    <legend>Data Blok/Komplek</legend>
    <table id="tbl_blok" style="display: none;"></table>
    
    <div id="add_model" class="modal fade">       
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <form name="frm_blok" id="frm_blok">
                    <div class="modal-body">
                        <input type="hidden" value="" name="action" id="action">
                        <input type="hidden" value="0" name="edit_id" id="edit_id">
                        <div class="form-group">
                            <label for="namablok" class="control-label">Nama Blok:</label>
                            <input type="text" class="form-control input-sm" id="namablok" name="namablok"/>
                        </div>                                                  
                        <div class="form-group">
                            <label for="kelompok" class="control-label">Kelompok:</label>
                            <input type="text" class="form-control input-sm" id="kelompok" name="kelompok"/>
                        </div>                                                  
                    <div class="modal-footer">
                        <button type="button" id="btn_cancel" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="btn_add" class="btn btn-sm btn-primary">Save...</button>
                    </div>                
                </form>
            </div>
        </div>        
    </div>
</fieldset>

<script src="application/blok/script.js"></script>