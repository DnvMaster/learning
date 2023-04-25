@extends('admin.admin_master')

@section('admin')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Сменв пароля</h2>
        </div>
        <div class="card-body">
            <form class="form-pill" action="#">
                <div class="form-group">
                    <label for="exampleFormControlInput3">Старый пароль</label>
                    <input type="password" class="form-control" id="exampleFormControlInput3">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput3">Новый пароль</label>
                    <input type="password" class="form-control" id="exampleFormControlInput3">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput3">Повторите пароль</label>
                    <input type="password" class="form-control" id="exampleFormControlInput3">
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
