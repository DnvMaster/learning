<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Изображение</h2>
        <div class="py-12">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">

                            <div class="card-header">Изображение</div>
                            <div class="card-body">


                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Добавить Изображение</div>
                            <div class="card-body">


                                <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Изображение</label>
                                        <input type="file" name="image" class="form-control-file" id="exampleInputEmail1" aria-describedby="emailHelp">

                                        @error('brand_image')
                                        <span class="text-danger"> {{ $message }}</span>
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
