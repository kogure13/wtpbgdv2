$(document).ready(function () {

    $('#tbl_pelanggan').flexigrid({
        url: 'application/pelanggan/data_pelanggan.php',
        dataType: 'json',
        method: 'post',
        colModel: [
            {
                display: 'ID Pelanggan',
                name: 'id_Pel',
                align: 'right',
                width: 80
            }, {
                display: 'Nama Pelanggan',
                name: 'nama_pemilik',
                width: 170
            }, {
                display: 'Area',
                name: 'skarea',
                width: 80
            }, {
                display: 'Blok',
                name: 'namablok',
                width: 80
            }, {
                display: 'Kav',
                name: 'kav',
                align: 'right',
                width: 40
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
        searchitems: [
            {display: 'ID Pelanggan', name: 'id_Pel'},
            {display: 'Nama Pelanggan', name: 'nama_pemilik'}
        ],
        sortname: 'blok',
        sortorder: 'asc',
        usepager: true,
        useRp: true,
        rp: 15,
        title: 'List Data Pelanggan',
        singleSelect: true,
        striped: true,
        width: 'auto',
        height: 'auto'
    });

    var items = '';
    $.ajax({
        url: 'application/pelanggan/option_pelanggan.php',
        dataType: 'json',
        success: function (data) {
            $.each(data, function (key, value) {
                items += "<option value='" + value.id + "'>" + value.namablok + "</option>";
            });
            $('#blok').append(items);
        }
    });

    $.ajax({
        url: 'application/area/edit_area.php?id=1',
        dataType: 'json',
        type: 'post',
        success: function (data) {
            $('#areaname_id').val(data.id);
            $('#areaname').val(data.skarea);
        }
    });
});

function gridAction(com, grid) {
    if (com == 'Add') {
        $('#add_model').modal('show');
        $('#action').val('add');
        $('.modal-title').html('Add Data Pelanggan');
    } else if (com == 'Edit') {

    }
}

function ajaxAction(action) {
    data = $('#frm_pelanggan').serializeArray();
    $.ajax({
        url: 'application/pelanggan/data_pelanggan.php',
        dataType: 'json',
        type: 'post',
        success: function (response) {
            $('#add_model').modal('hide');
            $('#tbl_pelanggan').flexReload();
        }
    });
}