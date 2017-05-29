$(document).ready(function () {
    $('#btn_cancel').click(function () {
        $('#frm_blok').trigger('reset');
    });
    
    $('#tbl_blok').flexigrid({
        url: 'application/blok/data_blok.php',
        dataType: 'json',
        method: 'post',
        colModel: [
            {
                display: 'ID',
                name: 'id',
                width: 40
            }, {
                display: 'Nama Blok',
                name: 'namablok',
                width: 100

            }, {
                display: 'Kelompok',
                name: 'kelompok',
                width: 100
            }
        ],
        buttons: [
            {
                name: 'Add',
                bclass: 'add',
                onpress: gridAction
            }, {
                name: 'Edit',
                bclass: 'edit',
                onpress: gridAction
            }
        ],
        sortname: 'id',
        sortorder: 'asc',
        usepager: true,
        useRp: true,
        rp: 10,
        title: 'Data BLok/Komplek',
        singleSelect: true,
        striped: true,
        width: 'auto',
        height: 'auto'
    });
});

$(function(){
    $('#frm_blok').validate({
        rules: {
            namablok: {
                required: true
            },
            kelompok: {
                required: true
            }            
        },
        messages: {
            namablok: {
                required: 'field cannot empty'
            },
            kelompok: {
                required: 'field cannot empty'
            }
        },
        submitHandler: function(form){
            var com_action =$('#action').val();
            if(com_action == 'add'){
                ajaxAction('add');
            }else if(com_action == 'edit'){
                ajaxAction('edit');
            }
            
            $('#frm_blok').trigger('reset');
        }
    });    
});

function gridAction(com, grid){
    if(com == 'Add'){
        $('#add_model').modal('show');        
        $('.modal-title').html('Add Data Blok');
        $('#action').val('add');
    }else if(com == 'Edit'){
        if($('.trSelected', grid).length > 0){
            $('#add_model').modal('show');
            $('#action').val('edit');
            $('.modal-title').html('Edit Data Blok');
            $.each($('.trSelected', grid), function(key, value){
               $('#edit_id').val(value.children[0].innerText);               
               $('#namablok').val(value.children[1].innerText);
               $('#kelompok').val(value.children[2].innerText);
            });
        } else {
            swal("Warning", "No row selected First select row, then click edit button", "warning");
            return;
        }        
    }
}

function ajaxAction(action) {
    data = $('#frm_blok').serializeArray();
    console.log(data)
    $.ajax({
       url: 'application/blok/data_blok.php',
       dataType: 'json',
       type: 'post',
       data: data,
       success: function(response){
           $('#add_model').modal('hide');
           $('#tbl_blok').flexReload();
       }
    });
}