<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Редактирование категории</h2>
        <div class="py-12">
            <div class="container">
                <div class="row">

                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">Редактирование категории</div>
                            <div class="card-body">
                                <form action="{{ url('category/update/'.$categories->id) }} " method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"></label>
                                        <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $categories->category_name }}">
                                        @error('category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Обновить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-slot>
</x-app-layout>
