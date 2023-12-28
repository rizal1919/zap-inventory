@extends('layouts.template1')

@section('title', 'Sign Up')

@section('js_scripts')
    <script src="metronic_assets\particles.min.js"></script>
    <script src="metronic_assets\sign_up_inventory.js"></script>
@endsection

@section('css_scripts')
<style>
    #particles-js {
		position: fixed;
		width: 100%;
		height: 100%;
		background-color: #0b6e4f;
		background-image: url("");
		background-repeat: no-repeat;
		background-size: cover;
		background-position: 50% 50%;
    }

	#form{
		position: fixed;
		left: 50%;
		transform: translate(-50%, 0);
	}

	.same-height{
		width: 450px !important;
	}
</style>
@endsection

@section('content')
    <div id="particles-js">
        <!--begin::Authentication - Sign-up -->
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20 mt-10" id="form">
                <!--begin::Logo-->
                {{-- <a href="../../demo1/dist/index.html" class="mb-12">
                    <img alt="Logo" src="assets/media/logos/logo-1.svg" class="h-40px" />
                </a> --}}
                <!--end::Logo-->
                <div class="w-lg-1000px row justify-content-center p-10">
                    <div class="col-lg-8 same-height">
                        <img src="images\medical-support.jpg" alt="doctors-illustration" style="width: 160%; height: 100%; border-radius: 2%;" >
                    </div>
                    <div class="col-lg-4 same-height">
                        <!--begin::Wrapper-->
                        <div class="w-lg-350px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto" style="height: 100%;">
                            <!--begin::Form-->
                            <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form">
                                @csrf
                                <!--begin::Heading-->
                                <div class="mb-10 mt-5 text-center">
                                    <!--begin::Title-->
                                    <h1 class="text-dark mb-3 fs-1">Buat Akun</h1>
                                    <!--end::Title-->
                                    <!--begin::Link-->
                                    <div class="text-gray-400 fw-bold fs-6">Sudah punya akun?
                                    <a href="{{ route('guestLogin') }}" class="link-primary fw-bolder text-portal fs-6">Masuk disini</a></div>
                                    <!--end::Link-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Action-->
                                {{-- <button type="button" class="btn btn-light-primary fw-bolder w-100 mb-10">
                                <img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Sign in with Google</button> --}}
                                <!--end::Action-->
                                <!--begin::Separator-->
                                {{-- <div class="d-flex align-items-center mb-10">
                                    <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                                    <span class="fw-bold text-gray-400 fs-7 mx-2">OR</span>
                                    <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                                </div> --}}
                                <!--end::Separator-->
                                <!--begin::Input group-->
                                <div class="fv-row">
                                    {{-- <label class="form-label fw-bolder text-dark fs-6">Username</label> --}}
                                    <input class="form-control form-control-lg form-control-solid" type="text" placeholder="fullname" name="fullname" autocomplete="off" required/>
                                </div>
                                <div class="fv-row my-3">
                                    {{-- <label class="form-label fw-bolder text-dark fs-6">Username</label> --}}
                                    <input class="form-control form-control-lg form-control-solid" type="text" placeholder="username" name="username" autocomplete="off" required/>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                {{-- <div class="mb-10 fv-row" data-kt-password-meter="true">
                                    <!--begin::Wrapper-->
                                    <div class="mb-1">
                                        <!--begin::Label-->
                                        <label class="form-label fw-bolder text-dark fs-6">Password</label>
                                        <!--end::Label-->
                                        <!--begin::Input wrapper-->
                                        <div class="position-relative mb-3">
                                            <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />
                                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                                <i class="bi bi-eye-slash fs-2"></i>
                                                <i class="bi bi-eye fs-2 d-none"></i>
                                            </span>
                                        </div>
                                        <!--end::Input wrapper-->
                                        <!--begin::Meter-->
                                        <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                        </div>
                                        <!--end::Meter-->
                                    </div>
                                    <!--end::Wrapper-->
                                    <!--begin::Hint-->
                                    <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
                                    <!--end::Hint-->
                                </div> --}}
                                <!--end::Input group=-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-20">
                                    {{-- <label class="form-label fw-bolder text-dark fs-6">Password</label>
                                    <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" /> --}}
                                
                                    <!--begin::Label-->
                                    {{-- <label class="form-label fw-bolder text-dark fs-6">Password</label> --}}
                                    <!--end::Label-->
                                    <!--begin::Input wrapper-->
                                    <div class="position-relative mb-3">
                                        <input class="form-control form-control-lg form-control-solid" id="password" type="password" placeholder="password" name="password" autocomplete="off" required/>
                                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                            <svg xmlns="http://www.w3.org/2000/svg" id="open_eye" width="16" height="16" fill="currentColor" class="bi bi-eye-fill d-none" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" id="close_eye" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                                                <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
                                            </svg>
                                        </span>
                                    </div>
                                    <!--end::Input wrapper-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                {{-- <div class="fv-row mb-10">
                                    <label class="form-check form-check-custom form-check-solid form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="toc" value="1" />
                                        <span class="form-check-label fw-bold text-gray-700 fs-6">I Agree
                                        <a href="#" class="ms-1 link-primary">Terms and conditions</a>.</span>
                                    </label>
                                </div> --}}
                                <!--end::Input group-->
                                <!--begin::Actions-->
                                <div class="text-center">
                                    <button type="button" id="kt_sign_up_submit" class="btn btn-lg bg-portal">
                                        <span class="indicator-label">Daftar</span>
                                        <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                </div>
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            {{-- <div class="d-flex flex-center flex-column-auto p-10">
                <!--begin::Links-->
                <div class="d-flex align-items-center fw-bold fs-6">
                    <a href="https://keenthemes.com" class="text-muted text-hover-primary px-2">About</a>
                    <a href="mailto:support@keenthemes.com" class="text-muted text-hover-primary px-2">Contact</a>
                    <a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2">Contact Us</a>
                </div>
                <!--end::Links-->
            </div> --}}
            <!--end::Footer-->
        <!--end::Authentication - Sign-up-->
    </div>
@endsection


