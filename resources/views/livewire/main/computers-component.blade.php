@extends('layouts.template2')
@section('title', 'Dashboard')

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
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Komputer
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
                    <li class="breadcrumb-item text-muted">Master Komputer</li>
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
            
            {{-- <p style="color: gray;" class="mb-2 text-capitalize">Hi, {{ auth()->user()->username }}</p> --}}
            {{-- <h4 class="mb-10">{{ $data['time_greetings'] }}</h4> --}}

            

            <!--begin::Row-->
            {{-- <div class="row gy-5 g-xl-8">
                <div class="card card-xl-stretch p-10">
                    Hi {{ auth()->user()->username }}
                </div>
            </div> --}}
            <!--end::Row-->

            <div class="row mb-10">
                <!--begin::Container-->
                <div id="kt_content_container" class="">
                    <!--begin::Card-->
                    <div class="card p-10" wire:ignore>
                        <h5 style="margin-left: 35px;">Kategori Barang</h5>
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
                                    <input type="text" data-kt-category-table-filter="search_in_dash" class="form-control form-control-solid w-250px ps-14" name="nama_proyek" placeholder="Cari Kategori"/>
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
                                    <a href="javascript:return false;" class="btn btn-primary "  data-bs-toggle="modal" data-bs-target="#addNewCategory">Tambah Baru</a>
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
                            <table class="table align-middle table-hover table-row-dashed table-row-gray-300 fs-6 gy-5" id="category_dashboard">
                                <!--begin::Table head--> 
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-muted fw-bolder fs-7 gs-0">
                                        <th class="min-w-125px">Nama Kategori</th>
                                        <th class="min-w-125px">Jumlah</th>
                                        <th class="min-w-100px"></th>
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
                </div>
                <!--end::Container-->
                
            </div>
        </div>
        <!--end::Container-->
    </div>

    <!-- Add Modal -->
    {{-- <div class="modal fade" id="addNewCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Kategori Baru</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">
                <form id="add_category">
                    @csrf
                    <div class="col-lg-12">
                        <label for="category" class="form-label required">Nama Kategori</label>
                        <input type="text" name="category_name" required id="category" class="form-control" placeholder="masukan nama kategori .." aria-describedby="passwordHelpBlock">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-primary" onclick="addNewCategory()">Simpan</button>
            </div>
        </div>
        </div>
    </div> --}}

    <!-- Edit Modal -->
    {{-- <div class="modal fade" id="editCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Kategori</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">
                <form id="edit_category">
                    @csrf
                    <div class="col-lg-12">
                        <input type="hidden" id="id_category" name="id_category">
                        <label for="edit_category_name" class="form-label required">Nama Kategori</label>
                        <input type="text" name="edit_category_name" required id="edit_category_name" class="form-control" placeholder="masukan nama kategori ..">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-primary" onclick="editCategory()">Ubah</button>
            </div>
        </div>
        </div>
    </div> --}}
    <!--end::Post-->
</div>
@endsection
