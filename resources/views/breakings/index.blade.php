@extends('layouts.panel')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Поломки</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Редактирование поломок
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <h3 class="page-header">Добавить новую запись</h3>
                                <form method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="name">Название</label>
                                        <input name="name" id="name" type="text" class="form-control" placeholder="Название поломки" required>
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
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </form>
                            </div>
                            <div class="col-xs-8">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>Имя</th>
                                        <th>Управление</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($breakings as $key => $breaking)

                                        <tr class="{{ $key%2 ? 'odd' : 'even' }} gradeX">
                                            <td>{{$breaking->name}}</td>
                                            <td>
                                                <form method="post" action="{{route('breakings.destroy',[$breaking->id])}}">
                                                    {{csrf_field()}}
                                                    {{method_field('delete')}}
                                                    <button class="btn btn-danger">Удалить</button>
                                                    <a href="{{route('breakings.edit', $breaking->id)}}" class="btn btn-success">Редактировать</a>
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