@extends('admin.main')

@section('title')
 <title>Players</title>
@endsection

@section('style')
    <!--dynamic table-->
    <link href="{{ asset('admin/js/advanced-datatable/css/demo_page.css')}}" rel="stylesheet" />
    <link href="{{ asset('admin/js/advanced-datatable/css/demo_table.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/js/data-tables/DT_bootstrap.css')}}" />
@endsection
@section('content')
 <!-- page heading start-->
        <div class="page-heading">
            <h3>
                Players
            </h3>
            <ul class="breadcrumb">
                <li class="active">Players</li>
            </ul>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
        </div>
 <!-- page heading end-->
        <hr/>
        <!--body wrapper start-->
        <div class="wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="square-widget">
                        <div class="widget-container">
                            <div class="stepy-tab">
                            </div>
                            <form id="default" class="form-horizontal">
                                <fieldset title="Available Players">
                                    <legend>Available Players</legend>
<!-- ======================================start Current player Data table=================================== -->
                                    @include('admin.partials.currentPlayer')
<!-- ======================================End Current player Data table===================================== -->
                                </fieldset>
                                <fieldset title="Injured Players">
                                    <legend>Injured Players</legend>
<!-- ======================================start Injured player Data table=================================== -->
                                    @include('admin.partials.injuredPlayer')
<!-- ======================================End Injured player Data table===================================== -->
                                </fieldset>
                                <button class="btn btn-info finish" style="display:none">
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!--body wrapper end-->
@endsection

@section('script')
    <!--dynamic table-->
    <script type="text/javascript" language="javascript" src="{{ asset('admin/js/advanced-datatable/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/data-tables/DT_bootstrap.js') }}"></script>
    <!--dynamic table initialization -->
    <script src="{{ asset('admin/js/dynamic_table_init.js') }}"></script>
@endsection

