<?php
/** @var \App\Models\Category $category */
?>

@extends('layouts.panel')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Категории</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Редактирование категорий
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <h3 class="page-header">Изменить категорию</h3>
                                <form method="post" action="{{route('categories.update', $category->id)}}">
                                    {{csrf_field()}}
                                    {{method_field('put')}}
                                    <div class="form-group">
                                        <label for="name">Название</label>
                                        <input name="name" id="name" type="text" class="form-control" placeholder="Название категории" value="{{$category->name}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="stub">Текст заглушки для категории</label>
                                        <input name="stub" id="stub" type="text" class="form-control" placeholder="Введите текст" value="{{$category->stub}}" required>
                                    </div>
                                    <div class="form-group">
                                        <span class="input-group">
                                             <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                               <i class="fa fa-picture-o"></i> Выбрать
                                             </a>
                                           </span>
                                        <input id="thumbnail" class="form-control" type="hidden" name="image" value="{{$category->image}}">
                                        <img id="holder" style="margin-top:15px;max-height:100px;" src="{{$category->getImageUrl()}}">

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