@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <h2 class="mt-4">Tempat Wisata</h2>
                    <div class="row">
                        @forelse ($tempat as $row)
                            <div class="col-md-6">
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <p><strong>DESTINASI WISATA:</strong> {{ $row->nama_tempat }}</p>
                                        <p><strong>Kategori:</strong> {{ $row->kategori }}</p>
                                        <div class="rating">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <span class="fa fa-star rating-star" data-id="{{ $row->id_wisata }}" data-value="{{ $i }}" style="color: {{ $i <= $row->rating ? 'gold' : 'gray' }}; cursor: pointer;"></span>
                                            @endfor
                                        </div>
                                        <div class="deskripsi mt-2">
                                            <p><strong>Fasilitas:</strong> {{ $row->fasilitas }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <div class="alert alert-danger">
                                    Data masih kosong
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.rating-star').forEach(star => {
        star.addEventListener('click', function () {
            const wisataId = this.getAttribute('data-id');
            const ratingValue = this.getAttribute('data-value');
            fetch(`/rate-wisata/${wisataId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ rating: ratingValue })
            }).then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Rating gagal disimpan');
                }
            }).then(data => {
                if (data.success) {
                    document.querySelectorAll(`.rating-star[data-id='${wisataId}']`).forEach(star => {
                        const starValue = star.getAttribute('data-value');
                        star.style.color = starValue <= ratingValue ? 'gold' : 'gray';
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
