// import { Ziggy } from 'ziggy';
// import DataTable from 'datatables.net-dt';
// import route from 'ziggy';
// var oTable;

var CategoryTable = (function () {
    var filterData = {};

    var initDatatable = function () {
        oTable = new DataTable('#items_table', {
            processing: true,
            serverSide: true,
            retrieve: true,
            "pageLength": 5,
            ajax: {
                data: (d) => Object.assign(d, filterData),
                // url: base_url + '/category-index',
                url: route('item.index'),
            },
            columns: [
                {
                    data: "nama_barang",
                    className: "text-capitalize",
                    render: function (data, type, row) {
                        return `<p class="text-primary" style="cursor: pointer;" onclick="showDetailBarang('${row.id}')">${data}</p>`;
                    },
                },
                {
                    data: "merk",
                    className: "text-capitalize",
                },
                {
                    data: "nomor_seri",
                    className: "text-uppercase",
                },
                {
                    data: "last_edited_by_id",
                    render: function (data, type, row) {
                        return row.last_edit_user[0].username;
                    },
                    className: "text-capitalize",
                },
                {
                    data: null,
                    className: "text-center",
                    render: function (data, type, row) {
                        console.log(row);
                        return `<a href="javascript:void(0)" onclick="showForEditBarang(${row.id})" class="btn btn-sm btn-success">
                                Edit
                                </a>`;
                    },
                    searchable: false
                    
                },

            ],
        } );
        // oTable = $("#category_dashboard").DataTable({
        //     processing: true,
        //     serverSide: true,
        //     retrieve: true,
        //     ajax: {
        //         data: (d) => Object.assign(d, filterData),
        //         url: "{{ route('category.index') }}",
        //     },
        //     dataSrc: (f) => {
        //         console.log(f);
        //     },
        //     columns: [
        //         {
        //             data: "category_name"
        //         },
        //         {
        //             data: "stock"
        //         },
        //     ],
        // });

        // // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        // oTable.on("draw", function () {
        //     // handleDeleteRows();
        //     KTMenu.createInstances();
        // });
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

    // var handleSelectDatatable = function(){
    //     const selectOptions = document.getElementById('category_in_dash');
    //     selectOptions.addEventListener("change", function (e) {
    //         filterData.category_id = e.target.value;
    //     });
    //     oTable.draw(false);
    // }

    // Filter Datatable
    // var handleFilterDatatable = () => {
    //     var start = moment().subtract(29, "days");
    //     var end = moment();

    //     function cb(start, end) {
    //         $("#project_table_sales_filter").html(
    //             start.format("MMMM D, YYYY") + "-" + end.format("MMMM D, YYYY")
    //         );
    //     }

    //     $("#project_table_sales_filter").daterangepicker(
    //         {
    //             startDate: start,
    //             endDate: end,
    //             ranges: {
    //                 Today: [moment(), moment()],
    //                 Yesterday: [
    //                     moment().subtract(1, "days"),
    //                     moment().subtract(1, "days"),
    //                 ],
    //                 "Last 7 Days": [moment().subtract(6, "days"), moment()],
    //                 "Last 30 Days": [moment().subtract(29, "days"), moment()],
    //                 "This Month": [
    //                     moment().startOf("month"),
    //                     moment().endOf("month"),
    //                 ],
    //                 "Last Month": [
    //                     moment().subtract(1, "month").startOf("month"),
    //                     moment().subtract(1, "month").endOf("month"),
    //                 ],
    //             },
    //         },
    //         cb
    //     );

    //     cb(start, end);
    //     // Select filter options
    //     $("#project_table_sales_filter").on("change", function () {
    //         const date = $("#project_table_sales_filter").val();
    //         filterData.date = date;

    //         oTable.draw(false);
    //     });

    //     $("#kt_project_sales_flatpickr_clear").on("click", function () {
    //         $("#project_table_sales_filter").val("");
    //         const date = $("#project_table_sales_filter").val();
    //         filterData.date = date;

    //         oTable.draw(false);
    //     });
    // };

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

CategoryTable.init();



const addNewItem = () => {
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
                url: route("item.store"),
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    Swal.fire('Berhasil Tersimpan!', '', 'success')
                    addForm.reset();
                    $('#addNewItems').modal('toggle');
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

const showDetailBarang = (id) => {
    $.ajax({
        type: "GET",
        url: route("item.show", btoa(id)),
        processData: false,
        contentType: false,
        success: function (response) {
            $("#nama_barang").text(response.data.nama_barang);
            $("#kategori").text(response.data.categories.category_name);
            $("#penerima").text(response.data.penerima);
            $("#merk").text(response.data.merk);
            $("#tipe").text(response.data.tipe);
            $("#nomor_seri").text(response.data.nomor_seri);
            $("#toko").text(response.data.toko === null ? "-" : response.data.toko);
            $("#harga").text(response.data.harga === null ? "-" : response.data.harga);
            $("#keterangan").text(response.data.keterangan === null ? "-" : response.data.keterangan);
            $("#kapasitas").text(response.data.kapasitas === null ? "-" : response.data.kapasitas);
            $("#status").text(response.data.status === null ? "-" : response.data.status);
            const d = new Date(response.data.updated_at);
            $("#updated_at").text(moment(d.getTime()).format('DD MMMM YYYY'));
            $("#last_edited_by_id").text(response.data.last_edit_user[0].username);
            toastr.success('Lihat Detail', 'Berhasil')
        },
        error: function (error) {
            Swal.fire(error.responseJSON.message, '', 'info')
        },
    });
}

const showForEditBarang = (id) => {
    $.ajax({
        type: "GET",
        url: route("item.show", btoa(id)),
        processData: false,
        contentType: false,
        success: function (response) {
            $("#edit_nama_barang").val(response.data.nama_barang);
            var optionsCategories = "";
            response.categories.forEach(data => {
                if(response.data.category_id === data.id){
                    optionsCategories += `<option value="${data.id}" selected>${data.category_name}</option>`;
                }else{
                    optionsCategories += `<option value="${data.id}">${data.category_name}</option>`;
                }
            });

            $("#items_id").val(id);
            $("#edit_category_id").html(optionsCategories);
            $("#edit_penerima").val(response.data.penerima);
            $("#edit_merk").val(response.data.merk);
            $("#edit_tipe").val(response.data.tipe);
            $("#edit_nomor_seri").val(response.data.nomor_seri);
            $("#edit_toko").val(response.data.toko === null ? "" : response.data.toko);
            $("#edit_harga").val(response.data.harga === null ? "" : response.data.harga);
            $("#edit_keterangan").val(response.data.keterangan === null ? "" : response.data.keterangan);
            $("#edit_kapasitas").val(response.data.kapasitas === null ? "" : response.data.kapasitas);

            const status = ['Digunakan', 'Tidak Digunakan', 'Afkir', 'Service'];
            var optionsStatus = "";
            response.statusCode.forEach(data => {
                console.log(data);
                if(response.data.status === data.code_id){
                    optionsStatus += `<option value="${data.code_id}" selected>${data.status}</option>`;
                }else{
                    optionsStatus += `<option value="${data.code_id}">${data.status}</option>`;
                }
            });
            $("#edit_status").html(optionsStatus);

            $("#editItems").modal('show');
            toastr.info('Edit Data', 'Sedang Dikerjakan')
        },
        error: function (error) {
            Swal.fire(error.responseJSON.message, '', 'info')
        },
    });
}

const editItem = () => {
    var id = $('#items_id').val();
    var editForm  = document.getElementById('edit_item');
    var formData = new FormData(editForm);
    
    $.ajax({
        type: "POST",
        url: route("item.update", btoa(id)),
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            editForm.reset();
            $("#editItems").modal('hide');
            Swal.fire('Berhasil Diubah!', '', 'success')
            oTable.draw(false);
        },
        error: function (error) {
            Swal.fire(error.responseJSON.message, '', 'error');
        },
    });
}
// On document ready
