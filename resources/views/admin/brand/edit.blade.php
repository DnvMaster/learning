
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Редактирование брэндов</h2>
        <div class="py-12">
            <div class="container">
                <div class="row">

                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">Редактирование брэндов</div>
                            <div class="card-body">
                                <form action="{{ url('brand/update/'.$brands->id) }} " method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"></label>
                                        <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $brands->brand_name }}">
                                        @error('brand_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1"></label>
                                        <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $brands->brand_image }}">
                                        @error('brand_image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <img src="{{ asset($brands->brand_image) }}" style="width: 400px; height: 200px;" alt="Brand image">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Обновить брэнд</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-slot>
</x-app-layout>
