$(document).ready(function () {
    $('#list_pel').autocomplete({
        source: 'application/input_wm/list_typePelanggan.php',
        minLength: 2,
        select: function(event, ui){
            event.preventDefault();
            $('#id_Pel').val(ui.item.id);
            $('#list_pel').val(ui.item.label);
            $('#nama_pemilik').val(ui.item.nama_pemilik);
        }
    });
    
    var date = $.datepicker.formatDate('yy/mm/dd', new Date());
    $('#date_iwm').val(date);
    
    $('#tbl_iwm').flexigrid({
        url: '',
        dataType: 'json',
        method: 'post',
        colModel: [],
        buttons: [],
        searchitems: [
            {display: 'ID Pelangggan', name: 'id_Pel'},
            {display: 'Nama Pelanggan', name: 'nama_pemilik'}
        ],
        sortname: 'date_iwm',
        sortorder: 'asc',
        usepager: true,
        useRp: true,
        rp: 15,
        title: 'Data Pencatatan Water Meter',
        singleSelect: true,
        striped: true,
        width: 'auto',
        height: 'auto'        
    });
});

$(function(){
    $('#frm_iwm').validate({
        rules: {
            list_pel: {
                required: true
            }, 
            iwm: {
                required: true
            }
        },
        messages: {
            list_pel: {
                required: 'ID. Pelanggan harus disi'
            }, 
            iwm: {
                required: 'Water Meter harus diisi'
            }                                    
        },
        submitHandler: function(form){
            var com_action =$('#action').val();
            if(com_action == 'add'){
                ajaxAction('add');
            }
            
            $('#frm_area').trigger('reset');
        }
    });    
});

function ajaxAction(action) {
    data = $('#frm_area').serializeArray();
    console.log(data)
    $.ajax({
       url: 'application/area/data_area.php',
       dataType: 'json',
       type: 'post',
       data: data,
       success: function(response){
           $('#add_model').modal('hide');
           $('#tbl_area').flexReload();
       }
    });
}