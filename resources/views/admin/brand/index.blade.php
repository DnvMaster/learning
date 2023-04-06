<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Все брэнды</h2>
        <div class="py-12">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
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
                            <div class="card-header">Все брэнды</div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr class="text-center">
                                        <th scope="col">№</th>
                                        <th scope="col">Название</th>
                                        <th scope="col">Изображение</th>
                                        <th scope="col">Дата создания</th>
                                        <th scope="col">Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!-- @php($i = 1) -->
                                    @foreach($brands as $brand)
                                        <tr class="text-center">
                                            <th scope="row">{{ $brands->firstItem()+$loop->index }}</th>
                                            <td>{{ $brand->brand_name }}</td>
                                            <td><img src="" alt=""></td>
                                            <td>
                                                @if($brand->created_at == NULL)
                                                    <span class="text-danger">Дата не установлена.</span>
                                                @else
                                                    {{ Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}
                                            </td>
                                            @endif
                                            <td>
                                                <a href="{{ url('brand/edit/'.$brand->id) }}" class="btn btn-info">Ред-ть</a>
                                                <a href="{{ url('brand/delete/'.$brand->id) }}" class="btn btn-danger">К-зина</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                {{ $brands->links() }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Добавить брэнд</div>
                            <div class="card-body">
                                <form action="{{ route('store.category') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Название брэнда</label>
                                        <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        @error('brand_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Изображение брэнда</label>
                                        <input type="file" name="brand_image" class="form-control-file" id="exampleFormControlFile1" aria-describedby="emailHelp">
                                        @error('brand_name')
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

    </x-slot>
</x-app-layout>
