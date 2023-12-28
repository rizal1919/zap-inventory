@extends('layouts.template1')

@section('title', 'sign-in')

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

@section('js_scripts')
	<script src="metronic_assets\particles.min.js"></script>
    <script src="metronic_assets\general.js"></script>
@endsection

@section('content')
    <!--begin::Authentication - Sign-in -->
	{{-- <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(images/14.png)"> --}}
	<div id="particles-js">
		<!--begin::Content-->
		<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20 mt-10" id="form">
			<!--begin::Logo-->
			{{-- <a href="../../demo1/dist/index.html" class="mb-12">
				<img alt="Logo" src="assets/media/logos/logo-1.svg" class="h-40px" />
			</a> --}}
			<!--end::Logo-->
			<!--begin::Wrapper-->
			<div class="w-lg-1000px row justify-content-center p-10">
				<div class="col-lg-8 same-height">
					<img src="images\medical-support.jpg" alt="doctors-illustration" style="width: 160%; height: 100%; border-radius: 2%;" >
				</div>
				<div class="col-lg-4 same-height">
					<div class="w-lg-350px bg-body rounded p-lg-15 mx-auto row">
						<!--begin::Form-->
						<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="../../demo1/dist/index.html" action="#">
							<!--begin::Heading-->
							@csrf
							<div class="text-center mb-10 mt-5">
								<!--begin::Title-->
								<h1 class="text-dark mb-3 fs-1">Portal</h1>
								<!--end::Title-->
								<!--begin::Link-->
								<div class="text-gray-400 fw-bold fs-6">Belum punya akun?
								<a href="{{ route('startSignup') }}" class="link-primary fw-bolder text-portal">Daftar disini</a></div>
								<!--end::Link-->
							</div>
							<!--begin::Heading-->
							<!--begin::Input group-->
							<div class="mb-5 fv-row">
								<!--begin::Label-->
								{{-- <label class="form-label fs-6 fw-bolder text-dark">Username</label> --}}
								<!--end::Label-->
								<!--begin::Input-->
								<input class="form-control form-control-lg form-control-solid" placeholder="username" type="text" value="" name="username" autocomplete="off" required/>
								<!--end::Input-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<!--begin::Wrapper-->
								<!--end::Wrapper-->
								<!--begin::Input-->
								<div class="position-relative mb-3">
									<input class="form-control form-control-lg form-control-solid" id="password" placeholder="password" type="password" value="" name="password" autocomplete="off" required/>
									<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2">
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
								<!--end::Input-->
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="text-center mb-20">
								<!--begin::Submit button-->
								<button type="submit" id="kt_sign_in_submit" class="btn btn-lg bg-portal mb-5">
									<span class="indicator-label">Masuk</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
								<!--end::Submit button-->
								<!--begin::Separator-->
								{{-- <div class="text-center text-muted text-uppercase fw-bolder mb-5">or</div> --}}
								<!--end::Separator-->
								<!--begin::Google link-->
								{{-- <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
								<img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Continue with Google</a> --}}
								<!--end::Google link-->
								<!--begin::Google link-->
								{{-- <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
								<img alt="Logo" src="assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-3" />Continue with Facebook</a> --}}
								<!--end::Google link-->
								<!--begin::Google link-->
								{{-- <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100">
								<img alt="Logo" src="assets/media/svg/brand-logos/apple-black.svg" class="h-20px me-3" />Continue with Apple</a> --}}
								<!--end::Google link-->
							</div>
							<!--end::Actions-->
						</form>
						<!--end::Form-->
					</div>
				</div>
			</div>
			<!--end::Wrapper-->
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
	</div>
	<!--end::Authentication - Sign-in-->
@endsection