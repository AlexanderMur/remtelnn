@extends('layouts.panel')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Главная</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-object-group fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">Категории</div>
                                <div class="huge">{{$cats->count()}}</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('categories.index')}}">
                        <div class="panel-footer">
                            <span class="pull-left">Редактировать</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tablet fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">Устройства</div>
                                <div class="huge">{{$device->count()}}</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('devices.index')}}">
                        <div class="panel-footer">
                            <span class="pull-left">Редактировать</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-bug fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">Поломки</div>
                                <div class="huge">{{$breakings->count()}}</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('breakings.index')}}">
                        <div class="panel-footer">
                            <span class="pull-left">Редактировать</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
{{--                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-support fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">Support</div>
                                <div class="huge">13</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Редактировать</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>--}}
            </div>
        </div>
    </div>
@stop

