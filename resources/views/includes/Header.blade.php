<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory Management System</title>

    <!-- Global stylesheets -->
    <link href="{{ url('assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/css/core.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">    
	<!-- /global stylesheets -->

    <!-- Core JS files -->
	<script src="{{ url('assets/js/plugins/loaders/pace.min.js') }}"></script>
    <script src="{{ url('assets/js/core/libraries/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/core/libraries/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- /core JS files -->


    <!-- Theme JS files -->
	<script src="{{ url('assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
    <script src="{{ url('assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
    <script src="{{ url('assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/pickers/daterangepicker.js') }}"></script>
    <script src="{{ url('assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/notifications/bootbox.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/notifications/sweet_alert.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/notifications/jgrowl.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/pickers/anytime.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ url('assets/js/plugins/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ url('assets/js/plugins/pickers/pickadate/picker.time.js') }}"></script>
    <script src="{{ url('assets/js/plugins/pickers/pickadate/legacy.js') }}"></script>
    <script src="{{ url('assets/js/plugins/notifications/sweet_alert.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>

    {{-- <script src="{{ url('assets/js/app.js') }}"></script> --}}

	<script src="{{ url('assets/js/plugins/visualization/echarts/echarts.min.js') }}"></script>
    <script src="{{ url('assets/js/demo_pages/charts/echarts/pies_donuts.js') }}"></script>
    <script src="{{ url('assets/js/core/libraries/jquery_ui/interactions.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/ui/prism.min.js') }}"></script>
    <script src="{{ url('assets/js/demo_pages/extension_blockui.js') }}"></script>
    <script src="{{ url('assets/js/demo_pages/picker_date.js') }}"></script>

    <script src="{{ url('assets/js/pages/form_inputs.js') }}"></script>

	<!-- /theme JS files -->
</head>
<body>

