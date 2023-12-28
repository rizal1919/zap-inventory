// import { Ziggy } from 'ziggy';
// import DataTable from 'datatables.net-dt';
// import route from 'ziggy';
// var oTable;

var ServiceTable = (function () {
    var filterData = {};

    var initDatatable = function () {
        oTable = new DataTable('#service_table', {
            processing: true,
            serverSide: true,
            retrieve: true,
            "pageLength": 5,
            ajax: {
                data: (d) => Object.assign(d, filterData),
                // url: base_url + '/category-index',
                url: route('service.index'),
            },
            columns: [
                {
                    data: "service_id",
                    className: "text-uppercase",
                    render: function (data, type, row) {
                        return `<a href="${ route('service.detail', btoa(row.item_id) ) }" class="text-primary" style="cursor: pointer;" ">${data}</a>`;
                    },
                },
                {
                    data: "nama_barang",
                    className: "text-capitalize",
                },
                {
                    data: "nomor_seri",
                    className: "text-uppercase",
                },
                {
                    data: "status",
                    render: function (data, type, row) {
                        var stats = data == 107 ? `<p class="badge badge-light-warning">In Progress</p>` : `<p class="badge badge-light-success">Completed</p>`
                        return stats;
                    },
                    className: "text-capitalize",
                },
                {
                    data: null,
                    className: "text-center",
                    render: function (data, type, row) {
                        var buttonAction = `<i class="fa-solid fa-pen-to-square btn btn-primary mx-1" onclick="showForEditService('${row.id}', '${row.item_id}', '${row.nomor_seri}')" style="margin: 0px auto;"></i>`;
                        if(row.status === 107)
                        {
                            buttonAction += `<a href="javascript:void(0)" onclick="callDoneService('${row.id}')" class="btn btn-sm btn-success">Selesai</a>`;
                        }

                        return buttonAction;
                    },
                    searchable: false
                    
                },

            ],
        } );
    };

    // Search Datatable --- official user reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = function () {
        const filterSearch = document.querySelector(
            '[data-kt-item-table-filter="search_in_items"]'
        );
        filterSearch.addEventListener("keyup", function (e) {
            oTable.search(e.target.value).draw();
        });
    };

    // Public methods
    return {
        init: function () {
            initDatatable();
            handleSearchDatatable();
            // handleSelectDatatable();
            // handleFilterDatatable();
        },
    };
})();

ServiceTable.init();

$("#tanggal_kerusakan").flatpickr({
    enableTime: true,
    dateFormat: "d-m-Y H:i",
});



$(".clear-manual-pic").click(function(e){
    e.preventDefault();
    $("#bukti_kerusakan").val("");
});
$(".clear-manual-pic-onedit").click(function(e){
    e.preventDefault();
    $("#edit_bukti_kerusakan").val("");
});

const daftarBarangTersedia = () => {
    $("#addNewService").modal("show");
    $.ajax({
        type: "GET",
        url: route("service.get_available_items"),
        processData: false,
        contentType: false,
        success: function (response) {
            let available_items = "<option></option>";
            response.items.forEach(data => {
                console.log(data);
                available_items += `<option value="${data.id}">${data.nomor_seri}</option>`
            });
            $("#nomor_seri").html(available_items);
        },
        error: function (error) {
            Swal.fire(error.responseJSON.message, '', 'info')
        },
    });
}

$('#nomor_seri').change(function (e) {
    if($('#nomor_seri').val() !== ""){
        const id = $("#nomor_seri").val();
        $.ajax({
            type: "GET",
            url: route("item.show", btoa($('#nomor_seri').val())),
            processData: false,
            contentType: false,
            success: function (response) {
                $("#nama_barang").val(`${response.data.nama_barang} ${response.data.tipe}`);

                // const status = ['Digunakan', 'Tidak Digunakan', 'Afkir', 'Service'];
                // var optionsStatus = "";
                // status.forEach(data => {
                //     if(response.data.status === data){
                //         optionsStatus += `<option value="${data}" selected>${data}</option>`;
                //     }else{
                //         optionsStatus += `<option value="${data}">${data}</option>`;
                //     }
                // });
                // $("#status").html(optionsStatus);
                $("#item_id").val(id);

                toastr.success('Lihat Detail', 'Berhasil')
            },
            error: function (error) {
                Swal.fire(error.responseJSON.message, '', 'info')
            },
        });
    }
});

const callDoneService = (id) => {
    $('#doneService').modal('show');
    $('#id_service').val(id);
}

const doneService = () => {

    var doneServiceForm  = document.getElementById('done_service');
    var formData = new FormData(doneServiceForm);

    $.ajax({
        type: "POST",
        url: route("service.done"),
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            Swal.fire('Berhasil Tersimpan!', '', 'success')
            doneServiceForm.reset();
            $('#doneService').modal('toggle');
            oTable.draw(false);
        },
        error: function (error) {
            // console.log(error);
            // console.log(error.responseJSON);
            // console.log(error.responseJSON.message);

            Swal.fire(error.responseJSON.message, '', 'info')
        },
    });
}

const addNewService = () => {
    Swal.fire({
        title: 'Apakah Data Sudah Benar?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Ya, Simpan',
        cancelButtonText: "Batal",
        customClass: {
            confirmButton:
                "btn btn-sm btn-primary",
            cancelButton: "btn btn-sm btn-secondary"
        },
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            var addForm  = document.getElementById('add_item');
            var formData = new FormData(addForm);

            $.ajax({
                type: "POST",
                url: route("service.store"),
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    Swal.fire('Berhasil Tersimpan!', '', 'success')
                    addForm.reset();
                    $('#addNewService').modal('toggle');
                    oTable.draw(false);
                },
                error: function (error) {
                    // console.log(error);
                    // console.log(error.responseJSON);
                    // console.log(error.responseJSON.message);

                    Swal.fire(error.responseJSON.message, '', 'info')
                },
            });
          
        } else if (result.isDenied) {
          Swal.fire('Changes are not saved', '', 'info')
        }
      })
}

// const showDetailBarang = (id) => {
//     $.ajax({
//         type: "GET",
//         url: route("item.show", btoa(id)),
//         processData: false,
//         contentType: false,
//         success: function (response) {
//             $("#nama_barang").text(response.data.nama_barang);
//             $("#kategori").text(response.data.categories.category_name);
//             $("#penerima").text(response.data.penerima);
//             $("#merk").text(response.data.merk);
//             $("#tipe").text(response.data.tipe);
//             $("#nomor_seri").text(response.data.nomor_seri);
//             $("#toko").text(response.data.toko === null ? "-" : response.data.toko);
//             $("#harga").text(response.data.harga === null ? "-" : response.data.harga);
//             $("#keterangan").text(response.data.keterangan === null ? "-" : response.data.keterangan);
//             $("#kapasitas").text(response.data.kapasitas === null ? "-" : response.data.kapasitas);
//             $("#status").text(response.data.status === null ? "-" : response.data.status);
//             const d = new Date(response.data.updated_at);
//             $("#updated_at").text(moment(d.getTime()).format('DD MMMM YYYY'));
//             $("#last_edited_by_id").text(response.data.last_edit_user[0].username);
//             toastr.success('Lihat Detail', 'Berhasil')
//         },
//         error: function (error) {
//             Swal.fire(error.responseJSON.message, '', 'info')
//         },
//     });
// }

const showForEditService = (id, item_id,seri_id) => {
    $.ajax({
        type: "GET",
        url: route("service.open_edit_service", btoa(id)),
        processData: false,
        contentType: false,
        success: function (response) {
            let available_items = "<option></option>";
            response.items.forEach(data_service => {
                if(data_service.nomor_seri == seri_id){
                    available_items += `<option value="${data_service.nomor_seri}" selected>${data_service.nomor_seri}</option>`;
                }else{
                    available_items += `<option value="${data_service.nomor_seri}">${data_service.nomor_seri}</option>`
                }
            });
            $("#edit_nomor_seri").html(available_items);
            $("#edit_nama_barang").val(response.data.nama_barang);

            $("#edit_tanggal_kerusakan").flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                defaultDate: response.data.tanggal_kerusakan,
            });
            $("#edit_tanggal_kerusakan").val(response.data.tanggal_kerusakan);
            $("#edit_nama_kerusakan").val(response.data.nama_kerusakan);
            if(response.data.pictures != ""){
                $("#bukti_kerusakan_gambar").removeClass("d-none");
                $("#bukti_kerusakan_gambar").attr("src", window.location.origin + "/" + response.data.pictures);
            }
            $("#edit_service_by").val(response.data.service_by);
            $("#edit_item_id").val(id);
            $("#edit_nomor_seri_hidden").val(response.data.nomor_seri);
            $("#editService").modal('show');

            toastr.info('Edit Data', 'Sedang Dikerjakan')
        },
        error: function (error) {
            Swal.fire(error.responseJSON.message, '', 'info')
        },
    });
}

const editService = () => {
    var id = $('#edit_item_id').val();
    var editForm  = document.getElementById('edit_item');
    var formData = new FormData(editForm);
    
    $.ajax({
        type: "POST",
        url: route("service.update", btoa(id)),
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            editForm.reset();
            $("#editService").modal('hide');
            Swal.fire('Berhasil Diubah!', '', 'success')
            oTable.draw(false);
        },
        error: function (error) {
            Swal.fire(error.responseJSON.message, '', 'error');
        },
    });
}
// On document ready
