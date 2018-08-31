@extends('layouts.panel')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Устройства</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Редактирование устройств
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-5">
                                <h3 class="page-header">Добавить новую модель</h3>
                                <form method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="name">Название</label>
                                        <input name="name" id="name" type="text" class="form-control" placeholder="Название модели" required>
                                    </div>
                                    <div class="form-group">

                                        @if (\Session::has('success'))
                                            <div class="alert alert-success">
                                                <ul>
                                                    <li>{!! \Session::get('success') !!}</li>
                                                </ul>
                                            </div>
                                        @endif

                                        @if (\Session::has('error'))
                                            <div class="alert alert-danger">
                                                <ul>
                                                    <li>{!! \Session::get('error') !!}</li>
                                                </ul>
                                            </div>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Выбирите категорию</label>
                                        <select class="form-control" id="category_id" name="category_id">
                                            @foreach ($cats as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </form>
                            </div>
                            <div class="col-xs-7">
                                <table width="100%" class="table table-bordered table-hover">
                                    @foreach ($cats as $key => $cat)
                                        <thead>
                                            <tr>
                                                <th class="text-center h2 bg-primary"><i style="margin-left: -38px" class="loading d-none fa fa-refresh fa-spin fa-fw"></i>{{$cat->name}}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="sortable">
                                        <?php
                                        /** @var \App\Models\Category $cat */

                                        ?>
                                        @foreach($cat->devices->sortBy('order') as $device)
                                            <tr data-device-id="{{$device->id}}">
                                                <td>
                                                    <table class="table table-bordered" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th width="65%" colspan="2"><i class="fa fa-2x fa-fw fa-bars sort-handle" aria-hidden="true"></i> {{$cat->name}} {{$device->name}}</th>
                                                                <th>
                                                                    <form method="post" action="{{route('devices.destroy',[$device->id])}}">
                                                                        {{csrf_field()}}
                                                                        {{method_field('delete')}}
                                                                        <button class="btn btn-danger">Удалить</button>
                                                                        <a href="{{route('devices.edit', $device->id)}}" class="btn btn-success">Редактировать</a>
                                                                    </form>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Поломка</td>
                                                                <td>Мин цена</td>
                                                                <td>Макс цена</td>
                                                            </tr>
                                                            @foreach($device->breakings as $breaking)
                                                                <tr class="text-center">
                                                                    <td>{{$breaking->name}}</td>
                                                                    <td>{{$breaking->pivot->min_price}}</td>
                                                                    <td>{{$breaking->pivot->max_price}}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>

                                                    </table>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    @endforeach
                                </table>



                                {{--<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>Имя Устройсва</th>
                                        <th>Категория</th>
                                        <th>Управление</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($cats as $key => $cat)

                                        @foreach($cat->devices as $device)
                                            <tr class="{{ $key%2 ? 'odd' : 'even' }} gradeX">
                                                <td class="h4">{{$device->name}}</td>
                                                <td class="h4">{{$cat->name}}</td>
                                                <td>
                                                    <form method="post" action="{{route('devices.destroy',[$device->id])}}">
                                                        {{csrf_field()}}
                                                        {{method_field('delete')}}
                                                        <button class="btn btn-danger">Удалить</button>
                                                        <a href="{{route('devices.edit', $device->id)}}" class="btn btn-success">Редактировать</a>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">

                                                    <table id="test3" class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Поломка</th>
                                                            <th>Минимальная цена</th>
                                                            <th>Максимальная цена</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($device->breakings as $breaking)
                                                            <tr class="text-center">
                                                                    <td>{{$breaking->name}}</td>
                                                                    <td>{{$breaking->pivot->min_price}}</td>
                                                                    <td>{{$breaking->pivot->max_price}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop