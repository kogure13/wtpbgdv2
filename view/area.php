
<fieldset>
    <legend>Data Area Pengelola</legend>
    <table id="tbl_area" style="display: none;"></table>

    <div id="add_model" class="modal fade">       
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <form name="frm_area" id="frm_area">
                    <div class="modal-body">
                        <input type="hidden" value="" name="action" id="action">
                        <input type="hidden" value="0" name="edit_id" id="edit_id">
                        <div class="form-group">
                            <label for="area_name" class="control-label">Nama area:</label>
                            <input type="text" class="form-control input-sm" id="areaname" name="areaname"/>
                        </div>  
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="skarea" class="control-label">SK Area:</label>
                                    <input type="text" class="form-control input-sm" id="skarea" name="skarea"/>
                                </div>                        
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <label for="companyname" class="control-label">Company Name:</label>
                                    <input type="text" class="form-control input-sm" id="companyname" name="companyname"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label for="address" class="control-label">Company Address:</label>
                                    <textarea class="form-control input-sm" id="address" name="address" style="height: 100px;"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-5">                                
                                <div class="form-group">
                                    <label for="state" class="control-label">State:</label>
                                    <input type="text" class="form-control input-sm" id="state" name="state"/>
                                </div>
                                <div class="form-group">
                                    <label for="city" class="control-label">City:</label>
                                    <input type="text" class="form-control input-sm" id="city" name="city"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="notlp" class="control-label">Tlp:</label>
                                    <input type="text" class="form-control input-sm" id="notlp" name="notlp"/>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="nofax" class="control-label">Fax:</label>
                                    <input type="text" class="form-control input-sm" id="nofax" name="nofax"/>
                                </div>
                            </div>                                
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="zipcode" class="control-label">Zipcode:</label>
                                    <input type="text" class="form-control input-sm" id="zipcode" name="zipcode"/>
                                </div>
                            </div>
                        </div>                                               
                        <div class="form-group">
                            <label for="email" class="control-label">E-Mail:</label>
                            <input type="text" class="form-control input-sm" id="email" name="email"/>
                        </div>                        
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

<script src="application/area/script.js"></script>
