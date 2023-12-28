// import { Ziggy } from 'ziggy';
// import DataTable from 'datatables.net-dt';
// import route from 'ziggy';
var oTable;

var CategoryTable = (function () {
    var filterData = {};

    var initDatatable = function () {
        oTable = new DataTable('#category_dashboard', {
            processing: true,
            serverSide: true,
            retrieve: true,
            ajax: {
                data: (d) => Object.assign(d, filterData),
                // url: base_url + '/category-index',
                url: route('category.index'),
            },
            columns: [
                {
                    data: "category_name",
                },
                // {
                //     data: "stock",
                //     className: "text-end",
                //     searchable: false,
                // },
                {
                    data: null,
                    className: "text-center",
                    render: function (data, type, row) {
                        console.log(row);
                        return `<a href="javascript:void(0)" onclick="findCategory(${row.id})" class="btn btn-sm btn-success">
                                Edit
                                </a>`;
                    },
                    searchable: false
                    
                }

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
            '[data-kt-category-table-filter="search_in_dash"]'
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

const addNewCategory = () => {
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
            var addForm  = document.getElementById('add_category');
            var formData = new FormData(addForm);
            $.ajax({
                type: "POST",
                url: route("category.store"),
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    Swal.fire('Berhasil Tersimpan!', '', 'success')
                    $("#category").val("")
                    $('#addNewCategory').modal('toggle');
                    oTable.draw(false);
                },
                error: function (error) {
                    const errors = Object.values(
                        error.responseJSON.errors
                    );
        
                    errors.forEach((element) => {
                        toastr.error(element[0], options);
                    });
                },
            });
          
        } else if (result.isDenied) {
          Swal.fire('Changes are not saved', '', 'info')
        }
      })
}

const findCategory = (id) => {
    $.ajax({
        type: "GET",
        url: route("category.show", btoa(id)),
        processData: false,
        contentType: false,
        success: function (response) {
            $("#editCategory").modal('show');
            $("#id_category").val(id);
            $("#edit_category_name").val(response.data.category_name);
        },
        error: function (error) {
            const errors = Object.values(
                error.responseJSON.errors
            );

            errors.forEach((element) => {
                toastr.error(element[0], options);
            });
        },
    });
}

const editCategory = () => {
    var id = $('#id_category').val();
    var addForm  = document.getElementById('edit_category');
    var formData = new FormData(addForm);
    
    $.ajax({
        type: "POST",
        url: route("category.update", btoa(id)),
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            $("#id_category").val("");
            $("#edit_category_name").val("");
            $("#editCategory").modal('hide');
            Swal.fire('Berhasil Diubah!', '', 'success')
            oTable.draw(false);
        },
        error: function (error) {
            const errors = Object.values(
                error.responseJSON.errors
            );

            errors.forEach((element) => {
                toastr.error(element[0], options);
            });
        },
    });
}
// On document ready
