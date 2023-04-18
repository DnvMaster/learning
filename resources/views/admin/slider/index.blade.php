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
                        <div class="card-header">Слайды</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">Заголовок</th>
                                    <th scope="col">Описание</th>
                                    <th scope="col">Слайд</th>
                                    <th scope="col">Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- @php($i = 1) -->
                                @foreach($sliders as $slider)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->description }}</td>
                                        <td><img src="{{ asset($slider->image) }}" style="height: 40px; width: 70px" alt="{{ $slider->title }}"></td>
                                        <td>
                                        <td>
                                            <a href="{{ url('slider/edit/'.$slider->id) }}" class="btn btn-info">Ред...</a>
                                            <a href="{{ url('slider/delete/'.$slider->id) }}" onclick="return confirm('Вы уверены, что хотите удалить этот слайд?')" class="btn btn-danger">Удл...</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a href="{{ route('add.slider') }}"><button class="btn btn-info">Добавить слайд</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
