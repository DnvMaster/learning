@extends('layouts.master_home')

@section('home_content')

<section id="clients" class="clients">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Все брэнды</h2>
        </div>

        <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">
            @foreach($brands as $brand)
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="client-logo">
                        <img src="{{ $brand->brand_image }}" class="img-fluid" alt="">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
