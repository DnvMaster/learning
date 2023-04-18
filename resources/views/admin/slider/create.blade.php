@extends('admin.admin_master')

@section('admin')
    <div class="col-lg-12">
        <div class="card card-default">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card-header card-header-border-bottom">
                <h2>Создание слайдов</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('store.slider') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Заголовок</label>
                        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Введите название слайда">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Описание</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" placeholder="Введите описание слайда"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Изображение</label>
                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
