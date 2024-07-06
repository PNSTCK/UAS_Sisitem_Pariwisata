@extends('layouts.frontend')

@section('content')
    <!--==================== HOME ====================-->
    <section>
        <div class="swiper-container">
            <div>
                <!--========== ISLANDS 1 ==========-->
                <section class="islands">
                    <img src="{{ asset('frontend/assets/img/hero.jpg') }}" alt="" class="islands__bg" />
                    <div class="bg__overlay">
                        <div class="islands__container container">
                            <div class="islands__data" style="z-index: 99; position: relative">
                                <h2 class="islands__subtitle">
                                    Explore
                                </h2>
                                <h1 class="islands__title">
                                    Wonderful Lombok
                                </h1>
                                <p class="islands__description">
                                    It's the perfect time to travel and
                                    enjoy the <br />
                                    beauty of Lombok.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>

    <!--==================== POPULAR ====================-->
    <section class="section" id="popular">
        <div class="container">
            <span class="section__subtitle" style="text-align: center">Best Choice</span>
            <h2 class="section__title" style="text-align: center">
                Popular Places
            </h2>

            {{-- <div class="popular__container swiper"> --}}
            {{-- <div class="swiper-wrapper"> --}}
            <section id="gallery">
                <div class="container">
                    <div class="row">
                        @forelse ($tempat as $row)
                            <div class="col-lg-4 mb-4">
                                <div class="card">
                                    <img src="gallery/{{ $row->gambar }}" class="card-img-top" alt="{{ $row->gambar }}"
                                        width="200" height="200">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $row->nama_tempat }}</h5>
                                        <p class="card-text">{{ $row->deskripsi }}</p>
                                        <p><strong>Kategori:</strong> {{ $row->kategori }}</p>
                                        <p><strong>Fasilitas:</strong> {{ $row->fasilitas }}</p>
                                        <p><strong>Daya tampung:</strong> {{ $row->daya_tampung }} Orang</p>
                                        <div class="rating mb-2">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <span class="fa fa-star rating-star" data-id="{{ $row->id }}"
                                                    data-value="{{ $i }}"
                                                    style="color: {{ $i <= $row->rating ? 'gold' : 'gray' }}; cursor: pointer;"></span>
                                            @endfor
                                        </div>
                                        <a href="{{ route('tempat.show', $row->id) }}"
                                            class="btn btn-outline-success btn-sm">Read More</a>
                                        {{-- <a href="#" class="btn btn-outline-danger btn-sm"><i
                                                class="far fa-heart"></i></a> --}}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-danger">
                                    Data masih kosong
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </section>


            {{-- </div> --}}
        </div>
    </section>

    <!--==================== VALUE ====================-->
    <section class="value section" id="value">
        <div class="value__container container grid">
            <div class="value__images">
                <div class="value__orbe"></div>

                <div class="value__img">
                    <img src="{{ asset('frontend/assets/img/team.jpg') }}" alt="" />
                </div>
            </div>

            <div class="value__content">
                <div class="value__data">
                    <span class="section__subtitle">Why Choose Us</span>
                    <h2 class="section__title">
                        Experience That We Promise To You
                    </h2>
                    <p class="value__description">
                        We are always ready to serve by providing the best
                        service for you. We make good choices to
                        travel around the world.
                    </p>
                </div>

                <div class="value__accordion">
                    <div class="value__accordion-item">
                        <header class="value__accordion-header">
                            <i class="bx bxs-shield-x value-accordion-icon"></i>
                            <h3 class="value__accordion-title">
                                Best places in the world
                            </h3>
                            <div class="value__accordion-arrow">
                                <i class="bx bxs-down-arrow"></i>
                            </div>
                        </header>

                        <div class="value__accordion-content">
                            <p class="value__accordion-description">
                                We provide the best places around the
                                world and have a good quality of
                                service.
                            </p>
                        </div>
                    </div>
                    <div class="value__accordion-item">
                        <header class="value__accordion-header">
                            <i class="bx bxs-x-square value-accordion-icon"></i>
                            <h3 class="value__accordion-title">
                                Affordable price for you
                            </h3>
                            <div class="value__accordion-arrow">
                                <i class="bx bxs-down-arrow"></i>
                            </div>
                        </header>

                        <div class="value__accordion-content">
                            <p class="value__accordion-description">
                                We try to make your budget fit with the
                                destination that you want to go.
                            </p>
                        </div>
                    </div>
                    <div class="value__accordion-item">
                        <header class="value__accordion-header">
                            <i class="bx bxs-bar-chart-square value-accordion-icon"></i>
                            <h3 class="value__accordion-title">
                                Best plan for your time
                            </h3>
                            <div class="value__accordion-arrow">
                                <i class="bx bxs-down-arrow"></i>
                            </div>
                        </header>

                        <div class="value__accordion-content">
                            <p class="value__accordion-description">
                                We provide you with time properly.
                            </p>
                        </div>
                    </div>
                    <div class="value__accordion-item">
                        <header class="value__accordion-header">
                            <i class="bx bxs-check-square value-accordion-icon"></i>
                            <h3 class="value__accordion-title">
                                Security guarantee
                            </h3>
                            <div class="value__accordion-arrow">
                                <i class="bx bxs-down-arrow"></i>
                            </div>
                        </header>

                        <div class="value__accordion-content">
                            <p class="value__accordion-description">
                                We make sure that our services have a
                                good level of security.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <!-- blog -->
    <section class="blog section" id="blog">
        <div class="blog__container container">
            <span class="section__subtitle" style="text-align: center">Our Blog</span>
            <h2 class="section__title" style="text-align: center">
                The Best Trip For You
            </h2>

            <div class="blog__content grid">
                @foreach ($blogs as $blog)
                    <article class="blog__card">
                        <div class="blog__image">
                            <img src="{{ Storage::url($blog->image) }}" alt="" class="blog__img" />
                            <a href="{{ route('blog.show', $blog->slug) }}" class="blog__button">
                                <i class="bx bx-right-arrow-alt"></i>
                            </a>
                        </div>

                        <div class="blog__data">
                            <h2 class="blog__title">
                                {{ $blog->title }}
                            </h2>
                            <p class="blog__description">
                                {{ $blog->excerpt }}
                            </p>

                            <div class="blog__footer">
                                <div class="blog__reaction">
                                    {{ date('d M Y', strtotime($blog->created_at)) }}
                                </div>
                                <div class="blog__reaction">
                                    <i class="bx bx-show"></i>
                                    <span>{{ $blog->reads }}</span>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.rating-star').forEach(star => {
                star.addEventListener('click', function() {
                    const wisataId = this.getAttribute('data-id');
                    const ratingValue = this.getAttribute('data-value');
                    fetch(`/rate-wisata/${wisataId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            rating: ratingValue
                        })
                    }).then(response => {
                        if (response.ok) {
                            return response.json();
                        } else {
                            throw new Error('Rating gagal disimpan');
                        }
                    }).then(data => {
                        if (data.success) {
                            document.querySelectorAll(`.rating-star[data-id='${wisataId}']`)
                                .forEach(star => {
                                    const starValue = star.getAttribute('data-value');
                                    star.style.color = starValue <= ratingValue ?
                                        'gold' : 'gray';
                                });
                        }
                    }).catch(error => {
                        console.error(error);
                    });
                });
            });
        });
    </script>
@endsection
