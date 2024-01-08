@extends('layouts.template2')
@section('title', 'Dashboard')

@section('js_scripts')
    <script src="js\main\items_index.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> --}}
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
@endsection

@section('css_scripts')
<style>
    .center {
        /* border: 5px solid; */
        transform: translate(140px, 50%);
    }
</style>
@endsection

@section('main_content')
@routes
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Barang
                <!--begin::Separator-->
                <span class="h-20px border-1 border-gray-200 border-start ms-3 mx-2 me-1"></span>
                <!--end::Separator-->
                <!--begin::Description-->
                <span class="text-muted fs-7 fw-bold mt-2"></span>
                <!--end::Description--></h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <li class="breadcrumb-item text-muted">Master Barang</li>
                    {{-- <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Aside</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Font Icons</li>
                    <!--end::Item--> --}}
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">    
            {{-- <div class="mb-3">
                <div class="kt_content_container">
                    <div class="row justify-content-between">
                        <div class="col-lg-4">
                            <div class="p-10 text-center" style="background-color: white; width: 100%; height: 100%; border-radius: 8px; box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px; overflow: auto;">
                                <h1 id="nama_barang" class="text-center d-flex justify-content-center align-items-end" style="height: 50%;">Klik Nama Barang</h1>
                                <p id="kategori" class="mt-3">-</p>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card card-bordered" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
                                <div class="card-header ribbon ribbon-top">
                                    <div class="ribbon-label bg-primary p-5">Last Edited : <span id="updated_at">-</span> / <span id="last_edited_by_id">-</span></div>
                                    <div class="card-title">Detail Barang</div>
                                </div>
                            
                                <div class="card-body">
                                    <div class="p-10" style="background-color: white; border-radius: 8px; box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="row mb-3">
                                                    <h6>Penerima</h6>
                                                    <p id="penerima">-</p>
                                                </div>
                                                <div class="row mb-3">
                                                    <h6>Merk</h6>
                                                    <p id="merk">-</p>
                                                </div>
                                                <div class="row">
                                                    <h6>Tipe</h6>
                                                    <p id="tipe">-</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row mb-3">
                                                    <h6>Toko</h6>
                                                    <p id="toko">-</p>
                                                </div>
                                                <div class="row mb-3">
                                                    <h6>No Seri</h6>
                                                    <p id="nomor_seri">-</p>
                                                </div>
                                                <div class="row">
                                                    <h6>Watt</h6>
                                                    <p id="watt">-</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row mb-3">
                                                    <h6>Status</h6>
                                                    <p id="status">-</p>
                                                </div>
                                                <div class="row mb-3">
                                                    <h6>Harga</h6>
                                                    <p id="harga">-</p>
                                                </div>
                                                <div class="row mb-3">
                                                    <h6>Keterangan Lain</h6>
                                                    <p id="keterangan">-</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="mb-10" style="margin-left: 0px;">
                <!--begin::Container-->
                <div class="kt_content_container" id="kt_content_container">
                    <!--begin::Card-->
                    <div class="card p-10" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" wire:ignore>
                        {{-- <h5 style="margin-left: 35px;">Barang</h5> --}}
                        <!--begin::Card header-->
                        <div class="card-header border-0 pt-6">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <input type="text" data-kt-item-table-filter="search_in_items" class="form-control form-control-solid w-250px ps-14" name="items_name" placeholder="Cari Barang"/>
                                </div>
                                <!--end::Search-->
                            </div>
                            <!--begin::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-project-table-toolbar="base">
                                    {{-- <div class="input-group w-250px me-3">
                                            <select class="form-select form-select-solid" data-allow-clear="true" id="category_in_dash" data-control-filter="select_category" data-control="select2" data-placeholder="-- Pilih Kategori --">
                                                <option></option>
                                                <option value="18">Approve</option>
                                                <option value="3">Reject</option>
                                                <option value="10">Process</option>
                                            </select>
                                    </div> --}}
                                    <a href="javascript:return false;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewItems" id="add_new_item" >Tambah Baru</a>
                                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Launch static backdrop modal
                                      </button> --}}
                                </div>
                                <!--end::Toolbar-->
                                <!--begin::Group actions-->
                                {{-- <div class="d-flex justify-content-end align-items-center d-none" data-kt-project-table-toolbar="selected">
                                    <div class="fw-bolder me-5">
                                    <span class="me-2" data-kt-project-table-select="selected_count"></span>Selected</div>
                                    <button type="button" class="btn btn-danger" data-kt-project-table-select="delete_selected">Delete Selected</button>
                                </div> --}}
                                <!--end::Group actions-->
                    
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body py-4" >
                            <!--begin::Table-->
                            <table class="table align-middle table-hover table-row-dashed table-row-gray-300 fs-6 gy-5" id="items_table">
                                <!--begin::Table head--> 
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-muted fw-bolder fs-7 gs-0">
                                        <th class="min-w-125px">Nama Barang</th>
                                        <th class="min-w-100px">Merk</th>
                                        <th class="min-w-100px">No Seri</th>
                                        <th class="min-w-100px">Terakhir Diedit</th>
                                        <th class="min-w-100px">Aksi</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-bold text-start">
                                    {{-- <td>A</td>
                                    <td>1212</td> --}}
                                </tbody> 
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                    {{-- @dd($statusCode) --}}
                </div>
                <!--end::Container-->
                
            </div>
        </div>
        <!--end::Container-->
    </div>

    <!-- Detail Modal -->
    <div class="modal fade" id="detailItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg w-500px">
        <div class="modal-content">
            <div class="modal-header  card-header ribbon ribbon-top dragable_touch">
                <div class="ribbon-label bg-success" style="max-width: 200px; position: absolute; left: 65px; top: 3px;" id="stats">Succeeded</div>
                <h1 class="modal-title  fs-1 fw-boldest mt-15" style="margin-left: 30px;" id="item_name">
                    Mouse 150R <br> <p class="text-muted mt-1" style="font-size: 10px;">Jul 3, 2020 09:21 pm</p>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-10 dragable_touch " style="background-color: #ECECEC;">
                <div class="" style="width: 90%; margin: 0px auto;">
                    <p class="text-muted fw-boldest mb-0" style="margin-bottom: 0xp; font-size: 10px; letter-spacing: 0.3px;" >Penerima</p>
                    <p class="fw-bolder fw-boldest" style="margin-top: 0px;" id="receiver">Decky Sundawa</p>
                    <hr class="fw-bold" style="height: 2px;">
                    <p class="fw-bolder fs-6 fw-boldest" style="margin-top: 0px;">Informasi Utama</p>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <p class="text-muted fw-boldest mb-0" style="margin-bottom: 0xp; font-size: 10px; letter-spacing: 0.3px;">Merk</p>
                            <p class="fw-bolder fw-boldest" style="margin-top: 0px;" id="detail_merk">Logitech</p>
                        </div>
                        <div class="col-lg-3">
                            <p class="text-muted fw-boldest mb-0" style="margin-bottom: 0xp; font-size: 10px; letter-spacing: 0.3px;">Tipe</p>
                            <p class="fw-bolder fw-boldest" style="margin-top: 0px;" id="detail_tipe">M100 R</p>
                        </div>
                        <div class="col-lg-3">
                            <p class="text-muted fw-boldest mb-0" style="margin-bottom: 0xp; font-size: 10px; letter-spacing: 0.3px;">No Seri</p>
                            <p class="fw-bolder fw-boldest" style="margin-top: 0px;" id="detail_nomor_seri">DSA322393</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <p class="text-muted fw-boldest mb-0" style="margin-bottom: 0xp; font-size: 10px; letter-spacing: 0.3px;">Watt</p>
                            <p class="fw-bolder fw-boldest" style="margin-top: 0px;" id="detail_watt">20 Volt</p>
                        </div>
                        <div class="col-lg-3">
                            <p class="text-muted fw-boldest mb-0" style="margin-bottom: 0xp; font-size: 10px; letter-spacing: 0.3px;">Kapasitas</p>
                            <p class="fw-bolder fw-boldest" style="margin-top: 0px;" id="detail_kapasitas">20 Gb</p>
                        </div>
                        <div class="col-lg-3">
                            <p class="text-muted fw-boldest mb-0" style="margin-bottom: 0xp; font-size: 10px; letter-spacing: 0.3px;">Toko</p>
                            <p class="fw-bolder fw-boldest" style="margin-top: 0px;" id="detail_toko">Shopee</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <p class="text-muted fw-boldest mb-0" style="margin-bottom: 0xp; font-size: 10px; letter-spacing: 0.3px;">Keterangan</p>
                            <p class="fw-bolder fw-boldest mt-1" style="margin-top: 0px;" id="detail_keterangan">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <hr class="fw-bold" style="height: 2px;">
                    <div class="row mt-7">
                        <div class="col-lg-9">
                            <p class="fw-bolder fs-6 fw-boldest" style="margin-top: 0px;">Terakhir Update</p>
                            <p class="text-muted fw-boldest mb-0" style="margin-bottom: 0xp; font-size: 10px; letter-spacing: 0.3px;">Tanggal, Pengguna</p>
                            <p class="fw-bolder fw-boldest mt-1" style="margin-top: 0px;" id="last_updated">23 Juni 2023, Decky Sundawa</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer dragable_touch" style="background-color: #ECECEC;">
            </div>
        </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addNewItems" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Barang Baru</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row" >
                <form id="add_item">
                    @csrf
                    <!--begin::Accordion-->
                    <div class="accordion" id="kt_accordion_1">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="kt_accordion_1_header_1">
                                <button class="accordion-button fs-4 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_1" aria-expanded="true" aria-controls="kt_accordion_1_body_1">
                                    Informasi Utama
                                </button>
                            </h2>
                            <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
                                <div class="accordion-body">
                                    <div class="mb-5">
                                        <label for="nama_barang" class="form-label required">Nama Barang</label>
                                        <input type="text" name="nama_barang" required id="nama_barang" class="form-control text-capitalize" placeholder="Mouse">
                                    </div>
                                    <div class="mb-5">
                                        <label for="penerima" class="form-label required">Penerima</label>
                                        <input type="text" name="penerima" required id="penerima" class="form-control text-capitalize" placeholder="Decky Sundawa">
                                    </div>
                                    <div class="mb-5">
                                        <!--begin::Label-->
                                        <label class="required form-label">Kategori Barang</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-select" data-dropdown-parent="#addNewItems" name="category_id" id="category_id" data-control="select2" data-placeholder="-- Pilih Kategori Barang --">
                                            <option></option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>                                               
                                        <!--begin::Description-->
                                        <!--end::Description-->
                                    </div>
                                    <div class="mb-5">
                                        <label for="nomor_seri" class="form-label required">No Seri</label>
                                        <input type="text" name="nomor_seri" required id="nomor_seri" class="form-control text-capitalize" placeholder="DSW32829P">
                                    </div>
                                    <div class="mb-5">
                                        <label for="merk" class="form-label required">Merk</label>
                                        <input type="text" name="merk" required id="merk" class="form-control text-capitalize" placeholder="Logitech">
                                    </div>
                                    <div class="mb-5">
                                        <label for="tipe" class="form-label required">Tipe</label>
                                        <input type="text" name="tipe" required id="tipe" class="form-control text-capitalize" placeholder="M 100">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="kt_accordion_1_header_2">
                                <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_2" aria-expanded="false" aria-controls="kt_accordion_1_body_2">
                                    Spesifikasi Tambahan
                                </button>
                            </h2>
                            <div id="kt_accordion_1_body_2" class="accordion-collapse collapse" aria-labelledby="kt_accordion_1_header_2" data-bs-parent="#kt_accordion_1">
                                <div class="accordion-body">
                                    <div class="mb-5">
                                        <label for="toko" class="form-label">Toko</label>
                                        <input type="text" name="toko" id="toko" class="form-control text-capitalize" placeholder="Online Shop">
                                    </div>
                                    <div class="mb-5">
                                        <label for="harga" class="form-label">Harga</label>
                                        <input type="number" name="harga" id="harga" class="form-control" placeholder="50879">
                                    </div>
                                    <div class="mb-5">
                                        <label for="watt" class="form-label">Watt</label>
                                        <input type="number" name="watt" id="watt" class="form-control" placeholder="50">
                                    </div>
                                    <div class="mb-5">
                                        <label for="kapasitas" class="form-label">Kapasitas</label>
                                        <input type="text" name="kapasitas" id="kapasitas" class="form-control" placeholder="50Gb">
                                    </div>
                                    <div class="mb-5">
                                        <!--begin::Label-->
                                        <label class="form-label">Status</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-select" data-dropdown-parent="#addNewItems" name="status" id="status" data-control="select2" data-placeholder="-- Pilih Status --">
                                            <option></option>
                                            
                                            @foreach($statusCode as $dataStatus)
                                                <option value="{{ $dataStatus->code_id }}">{{ $dataStatus->status }}</option>
                                            @endforeach
                                        </select>                                               
                                        <!--begin::Description-->
                                        <!--end::Description-->
                                    </div>
                                    <div class="mb-5">
                                        <label for="kode_logistik" class="form-label">Kode Logistik</label>
                                        <input type="text" name="kode_logistik" id="kode_logistik" class="form-control text-capitalize" placeholder="RSAH2349">
                                    </div>
                                    <div class="mb-5">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <textarea name="keterangan" class="form-control" placeholder="Keterangan tambahan" id="keterangan"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-lg-5 d-flex justify-content-center align-items-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="collective" style="height: 20px; width: 20px;" type="checkbox" id="inlineCheckbox1" value="true">
                                <label class="form-check-label" for="inlineCheckbox1">Barang Kolektif</label>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div id="kolektif" class="row mt-3" style="width: 50%;">
                                <input type="number" class="form-control" placeholder="0" name="count_koletif" id="count_kolektif">
                            </div>
                        </div>
                    </div>
                    <!--end::Accordion-->
                </form>
            </div>
            <div class="modal-footer" style="background-color: #f6f6f6;">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-primary" onclick="addNewItem()">Simpan</button>
            </div>
        </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editItems" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Barang</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">
                <form id="edit_item">
                    @csrf
                    <!--begin::Accordion-->
                    <div class="accordion" id="kt_accordion_1">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="kt_accordion_1_header_1">
                                <button class="accordion-button fs-4 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_1" aria-expanded="true" aria-controls="kt_accordion_1_body_1">
                                    Informasi Utama
                                </button>
                            </h2>
                            <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
                                <div class="accordion-body">
                                    <div class="mb-5">
                                        <label for="edit_nama_barang" class="form-label required">Nama Barang</label>
                                        <input type="text" name="nama_barang" required id="edit_nama_barang" class="form-control text-capitalize" placeholder="Mouse">
                                    </div>
                                    <div class="mb-5">
                                        <label for="edit_penerima" class="form-label required">Penerima</label>
                                        <input type="text" name="penerima" required id="edit_penerima" class="form-control text-capitalize" placeholder="Decky Sundawa">
                                    </div>
                                    <div class="mb-5">
                                        <!--begin::Label-->
                                        <label class="required form-label">Kategori Barang</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-select" data-dropdown-parent="#editItems" name="category_id" id="edit_category_id" data-control="select2" data-placeholder="-- Pilih Kategori Barang --">
                                            <option></option>
                                            {{-- @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach --}}
                                        </select>                                               
                                        <!--begin::Description-->
                                        <!--end::Description-->
                                    </div>
                                    <div class="mb-5">
                                        <label for="edit_nomor_seri" class="form-label required">No Seri</label>
                                        <input type="text" name="nomor_seri" required id="edit_nomor_seri" class="form-control text-capitalize" placeholder="DSW32829P">
                                    </div>
                                    <div class="mb-5">
                                        <label for="edit_merk" class="form-label required">Merk</label>
                                        <input type="text" name="merk" required id="edit_merk" class="form-control text-capitalize" placeholder="Logitech">
                                    </div>
                                    <div class="mb-5">
                                        <label for="edit_tipe" class="form-label required">Tipe</label>
                                        <input type="text" name="tipe" required id="edit_tipe" class="form-control text-capitalize" placeholder="M 100">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="kt_accordion_1_header_2">
                                <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_2" aria-expanded="false" aria-controls="kt_accordion_1_body_2">
                                    Spesifikasi Tambahan
                                </button>
                            </h2>
                            <div id="kt_accordion_1_body_2" class="accordion-collapse collapse" aria-labelledby="kt_accordion_1_header_2" data-bs-parent="#kt_accordion_1">
                                <div class="accordion-body">
                                    <div class="mb-5">
                                        <label for="edit_toko" class="form-label">Toko</label>
                                        <input type="text" name="toko" id="edit_toko" class="form-control text-capitalize" placeholder="Online Shop">
                                    </div>
                                    <div class="mb-5">
                                        <label for="edit_harga" class="form-label">Harga</label>
                                        <input type="number" name="harga" id="edit_harga" class="form-control" placeholder="50879">
                                    </div>
                                    <div class="mb-5">
                                        <label for="edit_watt" class="form-label">Watt</label>
                                        <input type="number" name="watt" id="edit_watt" class="form-control" placeholder="50">
                                    </div>
                                    <div class="mb-5">
                                        <label for="edit_kapasitas" class="form-label">Kapasitas</label>
                                        <input type="text" name="kapasitas" id="edit_kapasitas" class="form-control" placeholder="50Gb">
                                    </div>
                                    <div class="mb-5">
                                        <!--begin::Label-->
                                        <label class="form-label">Status</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-select" data-dropdown-parent="#editItems" name="status" id="edit_status" data-control="select2" data-placeholder="-- Pilih Status --">
                                            {{-- <option></option>
                                            <option value="Digunakan" selected>Digunakan</option>
                                            <option value="Tidak Digunakan">Tidak Digunakan</option>
                                            <option value="Afkir">Afkir</option>
                                            <option value="Service">Service</option> --}}
                                        </select>                                               
                                        <!--begin::Description-->
                                        <!--end::Description-->
                                    </div>
                                    <div class="mb-5">
                                        <label for="edit_kode_logistik" class="form-label">Kode Logistik</label>
                                        <input type="text" name="kode_logistik" id="edit_kode_logistik" class="form-control text-capitalize" placeholder="RSAH2349">
                                    </div>
                                    <div class="mb-5">
                                        <label for="edit_keterangan" class="form-label">Keterangan</label>
                                        <textarea name="keterangan" class="form-control" placeholder="Keterangan tambahan" id="edit_keterangan"></textarea>
                                        <input type="hidden" name="items_id" id="items_id">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Accordion-->
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
            <button type="button" class="btn btn-primary" onclick="editItem()">Update</button>
            </div>
        </div>
        </div>
    </div>
    <!--end::Post-->
</div>
@endsection
