@extends('layouts.panel')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Аккаунт</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <h3 class="page-header">Смена пароля</h3>
                                <form method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="old_pass">Старый пароль</label>
                                        <input name="old_pass" id="old_pass" type="password" class="form-control" required>
                                        @if ($errors->has('old_pass'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('old_pass') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="pass">Новый пароль</label>
                                        <input name="pass" id="pass" type="password" class="form-control" required>
                                        @if ($errors->has('pass'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('pass') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="pass_confirmation">Повторите пароль</label>
                                        <input name="pass_confirmation" id="pass_confirmation" type="password" class="form-control" required>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop