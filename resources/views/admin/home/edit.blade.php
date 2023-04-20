@extends('admin.admin_master')

@section('admin')
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Редактирование</h2>
            </div>
            <div class="card-body">
                <form action="{{ url('update/home-about/'.$home_about->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Заголовок</label>
                        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $home_about->title }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Краткий текст</label>
                        <input type="text" name="short_dis" class="form-control" id="exampleFormControlInput1" value="{{ $home_about->short_dis }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Полный текст</label>
                        <textarea name="long_dis" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $home_about->long_dis }}</textarea>
                    </div>

                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Обновить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
