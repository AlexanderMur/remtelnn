@extends('layouts.panel')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Устройсва</h1>
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
                            <div class="col-xs-6">
                                <h3 class="page-header">Редактировать модель</h3>
                                <form method="post" action="{{route('devices.update', $device->id)}}">
                                    {{csrf_field()}}
                                    {{method_field('put')}}
                                    <div class="form-group">
                                        <label for="name">Название</label>
                                        <input name="name" id="name" type="text" class="form-control" placeholder="Название устройства" value="{{$device->name}}">
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
                                                <option {{$cat->id == $device->category_id ? 'selected' : ''}} value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    @if (strtolower($device->getCategoryName()) == 'iphone')

                                        <div class="form-group">
                                            <label for="subcategories">Дополнительная информация</label>
                                            <input class="form-control" placeholder="Доп информация" id="subcategories" name="subcategories" type="text" value="{{$device->subcategories}}">
                                        </div>

                                    @endif


                                    <div class="alert alert-info">
                                        для того что-бы использовать доп.окно введите цену через "|"<br>
                                        пример: 500|100
                                    </div>
                                    <div class="form-group repeater">

                                        <div data-repeater-list="breakings">
                                            
                                            @if ($device->breakings->isNotEmpty())

                                                @foreach ($device->breakings as $breaking_device)
                                                    <div class="form-group form-inline" data-repeater-item>
                                                        <select disabled class="form-control" id="breakings" name="breaking_id">
                                                            @foreach ($breakings as $breaking)
                                                                <option {{$breaking->id == $breaking_device->pivot->breaking_id ? 'selected' : ''}} value="{{$breaking->id}}">{{$breaking->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <input class="no-repeat" type="text" hidden name="breaking_id" value="{{$breaking_device->pivot->breaking_id}}">
                                                        <input name="min_price" id="min_price" type="text" class="form-control" placeholder="Минимальная цена" value="{{$breaking_device->pivot->min_price}}">
                                                        <input name="max_price" id="max_price" type="text" class="form-control" placeholder="Максимальная цена" value="{{$breaking_device->pivot->max_price}}">
                                                        <button class="btn btn-danger" data-repeater-delete><i class="fa fa-times"></i></button>
                                                    </div>
                                                @endforeach

                                            @else

                                                <div data-repeater-list="breakings">
                                                    <div class="form-group form-inline" data-repeater-item>
                                                        <select class="form-control" id="breakings" name="breaking_id">
                                                            @foreach ($breakings as $breaking)
                                                                <option value="{{$breaking->id}}">{{$breaking->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <input name="min_price" id="min_price" type="text" class="form-control" placeholder="Минимальная цена">
                                                        <input name="max_price" id="max_price" type="text" class="form-control" placeholder="Максимальная цена">
                                                        <button class="btn btn-danger" data-repeater-delete><i class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                                
                                            @endif

                                        </div>
                                        <button class="btn btn-circle btn-success" data-repeater-create type="button" value="Add"><i class="fa fa-plus"></i></button>

                                    </div>

                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop