$(document).ready(function () {
    $('#btn_cancel').click(function () {
        $('#frm_area').trigger('reset');
    });
    
    $('#tbl_area').flexigrid({
        url: 'application/area/data_area.php',
        dataType: 'json',
        method: 'post',
        colModel: [
            {
                display: 'ID',
                name: 'id',
                width: 40
            }, {
                display: 'Area Name',
                name: 'areaname',
                width: 270

            }, {
                display: 'SK Area',
                name: 'skarea',
                width: 60
            }, {
                display: 'Company Name',
                name: 'companyname',
                width: 180
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
        title: 'Data Area',
        singleSelect: true,
        striped: true,
        width: 'auto',
        height: 'auto'
    });
});

$(function(){
    $('#frm_area').validate({
        rules: {
            areaname: {
                required: true
            },
            skarea: {
                required: true
            },
            companyname: {
                required: true
            },
            address: {
                required: true
            },
            notlp: {
                required: true
            },
            nofax: {
                required: true
            },
            zipcode: {
                required: true
            }            
        },
        messages: {
            areaname: {
                required: 'field cannot empty'
            },
            skarea: {
                required: 'field cannot empty'
            },
            companyname: {
                required: 'field cannot empty'
            },
            address: {
                required: 'field cannot empty'
            },
            notlp: {
                required: 'field cannot empty'
            },
            nofax: {
                required: 'field cannot empty'
            },
            zipcode: {
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
            
            $('#frm_area').trigger('reset');
        }
    });    
});

function gridAction(com, grid){
    if(com == 'Add'){
        $('#add_model').modal('show');        
        $('.modal-title').html('Add Area Pengelola');
        $('#action').val('add');
    }else if(com == 'Edit'){
        if($('.trSelected', grid).length > 0){
            $('#add_model').modal('show');
            $('#action').val('edit');
            $('.modal-title').html('Edit Area Pengelola');
            $.each($('.trSelected', grid), function(key, value){
               $('#edit_id').val(value.children[0].innerText);
               var id = $('#edit_id').val();                              
               $.ajax({
                   url: 'application/area/edit_area.php?id='+id,
                   dataType: 'json',
                   type: 'post',
                   success: function(data){
                       $('#areaname').val(data.areaname);
                       $('#skarea').val(data.skarea);
                       $('#companyname').val(data.companyname);
                       $('#state').val(data.state);
                       $('#city').val(data.city);
                       $('#address').val(data.address);
                       $('#notlp').val(data.notlp);
                       $('#nofax').val(data.nofax);
                       $('#email').val(data.email);
                       $('#zipcode').val(data.zipcode);
                   }
               });
            });
        } else {
            swal("Warning", "No row selected First select row, then click edit button", "warning");
            return;
        }        
    }
}

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