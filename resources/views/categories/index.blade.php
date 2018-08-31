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
                                <h3 class="page-header">Добавить новую категорию</h3>
                                <form method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="name">Название</label>
                                        <input name="name" id="name" type="text" class="form-control" placeholder="Название категории" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="stub">Текст заглушки для категории</label>
                                        <input name="stub" id="stub" type="text" class="form-control" placeholder="Введите текст" required>
                                    </div>
                                    <div class="form-group">
                                        <span class="input-group">
                                             <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                               <i class="fa fa-picture-o"></i> Выбрать
                                             </a>
                                        </span>

                                        <input id="thumbnail" class="form-control" type="hidden" name="image">
                                        <img id="holder" style="margin-top:15px;max-height:100px;">

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
                            <div class="col-xs-8">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>Имя</th>
                                        <th>Фото</th>
                                        <th>Управление</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($cats as $key => $cat)

                                        <tr class="{{ $key%2 ? 'odd' : 'even' }} gradeX">
                                            <td class="h4">{{$cat->name}}</td>
                                            <td><img style="max-height:100px;" class="center-block" src="{{asset($cat->image)}}" alt=""></td>
                                            <td style="vertical-align: middle">
                                                <form method="post" action="{{route('categories.destroy',[$cat->id])}}">
                                                    {{csrf_field()}}
                                                    {{method_field('delete')}}
                                                    <button class="btn btn-danger">Удалить</button>
                                                    <a href="{{route('categories.edit', $cat->id)}}" class="btn btn-success">Редактировать</a>
                                                </form>
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop