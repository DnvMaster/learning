<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Все категории</h2>
        <div class="py-12">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
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
                            <div class="card-header">Все категории</div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr class="text-center">
                                        <th scope="col">№</th>
                                        <th scope="col">Название</th>
                                        <th scope="col">Пользователь</th>
                                        <th scope="col">Дата создания</th>
                                        <th scope="col">Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!-- @php($i = 1) -->
                                    @foreach($categories as $category)
                                        <tr class="text-center">
                                            <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                            <td>{{ $category->category_name }}</td>
                                            <td>{{ $category->user->name }}</td>
                                            <td>
                                                @if($category->created_at == NULL)
                                                    <span class="text-danger">Дата не установлена.</span>
                                                @else
                                                    {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                                            </td>
                                                @endif
                                            <td>
                                                <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-info">Ред-ть</a>
                                                <a href="{{ url('softdelete/category/'.$category->id) }}" class="btn btn-danger">К-зина</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                {{ $categories->links() }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">Добавление категории</div>
                            <div class="card-body">
                                <form action="{{ route('store.category') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"></label>
                                        <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Введите катего..." aria-describedby="emailHelp">
                                        @error('category_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Добавить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- Trash part -->
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card-header">Корзина</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr class="text-center">
                                    <th scope="col">№</th>
                                    <th scope="col">Название</th>
                                    <th scope="col">Пользователь</th>
                                    <th scope="col">Дата создания</th>
                                    <th scope="col">Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- @php($i = 1) -->
                                @foreach($trashCat as $category)
                                    <tr class="text-center">
                                        <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ $category->user->name }}</td>
                                        <td>
                                            @if($category->created_at == NULL)
                                                <span class="text-danger">Дата не установлена.</span>
                                            @else
                                                {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                                        </td>
                                        @endif
                                        <td>
                                            <a href="{{ url('category/restore/'.$category->id) }}" class="btn btn-primary">Вернуть</a>
                                            <a href="{{ url('category/delete/'.$category->id) }}" class="btn btn-danger">Удалить</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $trashCat->links() }}
                        </div>
                    </div>
                </div>
            </div>
        <!-- // Trash part -->
    </x-slot>
</x-app-layout>
