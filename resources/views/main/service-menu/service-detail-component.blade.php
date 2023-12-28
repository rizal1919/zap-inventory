@extends('layouts.template2')
@section('title', 'Dashboard')



@section('main_content')
    <style>
        img.imgthumb {
            width: 150px;
            border-radius: 10px;
        }

        /* overlay by webprogramminunpas and modified by nelayankode.com*/
        .overlayz {
            width: 0;
            height: 0;
            overflow: hidden;
            position: fixed;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0);
            z-index: 9999;
            transition: .8s;
            text-align: center;
            padding: 150px 0;
        }

        .overlayz:target {
            width: auto;
            height: auto;
            bottom: 0;
            right: 0;
            background: rgba(0, 0, 0, .7);
        }

        .overlayz img {
            max-height: 100%;
            box-shadow: 2px 2px 7px rgba(0, 0, 0, .5);
        }

        .overlayz:target img {
            animation: zoomDanFade 1s;
        }

        .overlayz .close {
            position: absolute;
            top: 2%;
            right: 2%;
            margin-left: -20px;
            color: white;
            text-decoration: none;
            line-height: 14px;
            padding: 5px;
            opacity: 0;
        }

        .overlayz:target .close {
            animation: slideDownFade .5s .5s forwards;
        }

        /* animasi */
        @keyframes zoomDanFade {
            0% {
                transform: scale(0);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes slideDownFade {
            0% {
                opacity: 0;
                margin-top: -20px;
            }

            100% {
                opacity: 1;
                margin-top: 0;
            }
        }
    </style>
@routes
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Service
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
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('service') }}" class="text-muted text-hover-primary">History Perbaikan Barang</a>
                    </li>
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">Detail Perbaikan</li>
                    <!--end::Item-->
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

            <div class="mb-10" style="margin-left: 0px;">
                <!--begin::Container-->
                <div class="kt_content_container" id="kt_content_container">
                    <!--begin::Card-->
                    <div class="card p-10" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" wire:ignore>                
                        <!--begin::Col-->
                        <div class="col-xl-12">
                            <!--begin::List Widget 5-->
                            <div class="card card-xl-stretch">
                                <!--begin::Header-->
                                <div class="card-header align-items-center border-0 mt-4">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="fw-bolder mb-2 text-dark">Histori Perbaikan {{ $Item->nama_barang }} - {{ $Item->tipe }}</span>
                                        <span class="text-muted fw-bold fs-7">{{ $Services->count() }} Kerusakan</span>
                                    </h3>
                                    <div class="card-toolbar">
                                        <!--begin::Menu-->
                                        <!--end::Menu-->
                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-5">
                                    <!--begin::Timeline-->
                                    <div class="timeline-label">
                                        {{-- @dd($Services) --}}
                                        @foreach ($Services as $service)
                                            <!--begin::Item-->
                                            <div class="timeline-item">
                                                <!--begin::Label-->
                                                <div class="timeline-label fw-bolder text-gray-800 fs-6">{{ $service->created_at->format('H:i') }}</div>
                                                <!--end::Label-->
                                                <!--begin::Badge-->
                                                <div class="timeline-badge">
                                                    <i class="fa fa-genderless text-{{ $service->status == 107 ? 'warning' : 'success' }} fs-1"></i>
                                                </div>
                                                <!--end::Badge-->
                                                <!--begin::Text-->
                                                <div class="fw-mormal timeline-content fw-bolder ps-3">New service added <span class="text-primary">#{{ $service->service_id }}</span>
                                                    <!--begin::Description-->
                                                    <div class="d-flex align-items-center mt-1 fs-6">
                                                        <!--begin::Info-->
                                                        <div class="text-muted me-2 fs-7">Reported at {{ $service->created_at->format('d M Y') }} by {{ Auth::user()->fullname }}</div>
                                                        <!--end::Info-->
                                                        <!--begin::User-->
                                                        <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="{{ Auth::user()->username }}">
                                                            <img src="\images\ava.jpg" alt="img" />
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Description-->
                                                    <!--begin::Timeline details-->
                                                    <div class="overflow-hidden pb-5 mt-7">
                                                        <!--begin::Record-->
                                                        <div class="d-flex align-items-center border border-dashed border-gray-500 rounded min-w-750px px-7 py-3 mb-5">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <!--begin::Item-->
                                                                    <div class="overlay me-10">
                                                                        <!--begin::Image-->
                                                                        <div class="overlay-wrapper"> 
                                                                            <img class="thumb rounded w-150px" src="{{ $service->pictures == "" ? '\images\no-device-pic.png' : asset($service->pictures)  }}" alt="no_device_pic_default" />
                                                                        </div>
                                                                        <!-- Menampilkan thumbnail gambar -->
                                                                        <!-- Menampilkan popup gambar -->
                                                                        <div class="overlayz" id="gambar-{{ $service->id }}">
                                                                            <a href="#" class="close">
                                                                                <svg style="width:47px;height:47px" viewBox="0 0 24 24">
                                                                                    <path fill="currentColor" d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                                                                </svg>
                                                                            </a>
                                                                            <img src="{{ $service->pictures == "" ? '\images\no-device-pic.png' : asset($service->pictures)  }}" alt="no_device_pic_default">
                                                                        </div>
                                                                        <!--end::Image-->
                                                                        <!--begin::Link-->
                                                                        <div class="overlay-layer bg-dark bg-opacity-10 rounded w-150px">
                                                                            <a href="#gambar-{{ $service->id }}" class="btn btn-sm btn-primary btn-shadow">View</a>
                                                                        </div>
                                                                        <!--end::Link-->
                                                                    </div>
                                                                    <!--end::Item-->
                                                                </div>
                                                                <div class="col-lg-6" style="margin-left: 10px; text-align: justify; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; width: 400px; height: 100px;">
                                                                    <!--begin::Label-->
                                                                    <p class="fw-bolder mb-2">Status : <span class="badge badge-light-{{ $service->status == 107 ? 'warning' : 'success' }}">{{ $service->status == 107 ? 'In Progress' : 'Completed' }}</span></p>
                                                                    <div class="text-muted">
                                                                        {{ $service->nama_kerusakan }}
                                                                    </div>
                                                                    <p style="position: absolute; bottom: 35px;">Catatan : <span class="badge badge-light-primary">{{ $service->service_notes }}</span></p>
                                                                    <!--end::Label-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Record-->
                                                    </div>
                                                    <!--end::Timeline details-->
                                                </div>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Item-->
                                        @endforeach
                                        <!--begin::Item-->
                                        <div class="timeline-item mb-9">
                                            <!--begin::Label-->
                                            <div class="timeline-label fw-bolder text-gray-800 fs-6">00:00</div>
                                            <!--end::Label-->
                                            <!--begin::Badge-->
                                            <div class="timeline-badge">
                                                <i class="fa fa-genderless text-primary fs-1"></i>
                                            </div>
                                            <!--end::Badge-->
                                            <!--begin::Text-->
                                            <div class="timeline-content fw-mormal text-muted ps-3">Device is ready</div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Timeline-->
                                </div>
                                <!--end: Card Body-->
                            </div>
                            <!--end: List Widget 5-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Container-->
                
            </div>
        </div>
        <!--end::Container-->
    </div>

</div>
@endsection