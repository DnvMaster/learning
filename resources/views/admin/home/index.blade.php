@extends('admin.admin_master')

@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!-- Warning save category -->
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <!-- // Warning save category -->
                        <div class="card-header">О нас</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col" width="5%">№</th>
                                    <th scope="col" width="15%">Зазоловок</th>
                                    <th scope="col" width="25%">Краткий текст</th>
                                    <th scope="col" width="15%">Полный текст</th>
                                    <th scope="col">Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- @php($i = 1) -->
                                @foreach($home_about as $about)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $about->title }}</td>
                                        <td>{{ $about->short_dis }}</td>
                                        <td>{{ $about->long_dis }}</td>
                                        <td>
                                            <a href="{{ url('about/edit/'.$about->id) }}" class="btn btn-info">Ред...</a>
                                            <a href="{{ url('about/delete/'.$about->id) }}" onclick="return confirm('Вы уверены, что хотите удалить?')" class="btn btn-danger">Удл...</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a href="{{ route('add.about') }}"><button class="btn btn-info">Добавить</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection

