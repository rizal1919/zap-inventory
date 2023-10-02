<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
		<title>Zap Inventory</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<style>
			.text-portal{
				color: #0b6e4f !important;
			}

			.bg-portal{
				background-color: #0b6e4f !important;
				color: #fff !important;
			}
		</style>
		<link href="metronic_assets/plugins.bundle.js" rel="stylesheet" type="text/css" />
		<link href="metronic_assets/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="metronic_assets/style.bundle.css" rel="stylesheet" type="text/css" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="shortcut icon" type="image/x-icon" href="images\adihusada-logo.png" />
		
		@section('css_scripts')
		@show
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<div class="text-white">
				@routes
			</div>
			@yield('content')
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Javascript-->
		{{-- <script>var hostUrl = "assets/";</script> --}}
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="metronic_assets/plugins.bundle.js"></script>
		<script src="metronic_assets/scripts.bundle.js"></script>
		<script src="metronic_assets/widgets.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		@section('js_scripts')
		@show
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>