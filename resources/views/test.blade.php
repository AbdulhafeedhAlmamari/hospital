@extends('layouts.main')

@section('cssStyle')
    <style>
        @media (max-width: 768px) {
            .carousel-inner .carousel-item>div {
                display: none;
            }

            .carousel-inner .carousel-item>div:first-child {
                display: block;
            }
        }

        .carousel-inner .carousel-item.active,
        .carousel-inner .carousel-item-next,
        .carousel-inner .carousel-item-prev {
            display: flex;
        }

        /* display 3 */
        @media (min-width: 768px) {

            .carousel-inner .carousel-item-right.active,
            .carousel-inner .carousel-item-next {
                transform: translateX(33.333%);
            }

            .carousel-inner .carousel-item-left.active,
            .carousel-inner .carousel-item-prev {
                transform: translateX(-33.333%);
            }
        }

        .carousel-inner .carousel-item-right,
        .carousel-inner .carousel-item-left {
            transform: translateX(0);
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            {{-- button --}}
            <div class="d-flex justify-content-right my-5">
                <a href="{{ route('login') }}" class="btn btn-primary">{{ __('OVR') }}</a>
            </div>
        </div>
    </div>
    {{-- <div class="container text-center my-3"> --}}
    {{-- <h2 class="font-weight-light">Bootstrap 4 - Multi Item Carousel</h2> --}}
    <div class="row text-center mt-5">
        <div id="recipeCarousel mx-auto" class="carousel slide w-100 mx-auto" data-ride="carousel">
            <div class="carousel-inner w-100" role="listbox">
                <div class="carousel-item active ">
                    <div class="col-md-4 ">
                        <div class="card card-body rounded-lg">
                            <img class="img-fluid rounded-lg" src="{{asset('storage/images/book.jpg')}}">
                            <div class="mt-2">
                                <h5 class="card-title">Card title</h5>
                                <a href="#" class="btn btn-outline-primary">{{ __('View Details') }}</a>
                            </div>
                        </div>

                    </div>
                </div>
                
                <div class="carousel-item">
                    <div class="col-md-4 ">
                        <div class="card card-body rounded-lg">
                            <img class="img-fluid rounded-lg" src="{{asset('storage/images/book.jpg')}}">
                            <div class="mt-2">
                                <h5 class="card-title">Card title</h5>
                                <a href="#" class="btn btn-outline-primary">{{ __('View Details') }}</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon bg-primary p-3 border border-dark rounded-circle"
                    aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon bg-primary border p-3 border-dark rounded-circle"
                    aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    {{-- <h5 class="mt-2">Advances one slide at a time</h5> --}}
    {{-- </div> --}}
@endsection

@section('script')
    <script>
        $('#recipeCarousel').carousel({
            interval: 10000
        })

        $('.carousel .carousel-item').each(function() {
            var minPerSlide = 3;
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            for (var i = 0; i < minPerSlide; i++) {
                next = next.next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }

                next.children(':first-child').clone().appendTo($(this));
            }
        });
    </script>
@endsection
