@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Edit User') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('users.update', $user->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="form-group mb-3">
                                    <label for="hak_akses">Hak Akses</label>
                                    <select name="hak_akses" id="hak_akses" class="form-control">
                                        <option value="admin" {{ $user->hak_akses == 'admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="client" {{ $user->hak_akses == 'client' ? 'selected' : '' }}>Client
                                        </option>
                                        <option value="driver" {{ $user->hak_akses == 'driver' ? 'selected' : '' }}>Driver
                                        </option>
                                    </select>
                                    @error('hak_akses')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Update </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
