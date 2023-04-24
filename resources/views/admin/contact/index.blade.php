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
                        <div class="card-header">Контакты</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">Адрес</th>
                                    <th scope="col">Е-мэйл</th>
                                    <th scope="col">Телефон</th>
                                    <th scope="col">Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- @php($i = 1) -->
                                @foreach($contacts as $contact)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $contact->address }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>
                                            <a href="{{ url('contact/edit/'.$contact->id) }}" class="btn btn-info">Ред...</a>
                                            <a href="{{ url('contact/delete/'.$contact->id) }}" onclick="return confirm('Вы уверены, что хотите удалить данные о контакте ?')" class="btn btn-danger">Удл...</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a href="{{ route('add.contact') }}"><button class="btn btn-info">Добавить</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection

