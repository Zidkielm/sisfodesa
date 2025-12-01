@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Password</h1>
    </div>

    {{-- @if ($errors->any())
        @dd($errors->all())
    @endif --}}
    @if (session('success'))
        <script>
            Swal.fire({
                title: "Berhasil",
                text: "{{ session()->get('success') }}",
                icon: "success"
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            Swal.fire({
                title: "Gagal",
                text: "{{ session()->get('error') }}",
                icon: "error"
            });
        </script>
    @endif
    <div class="row">
        <div class="col">
            <form action="/change-password/{{ auth()->user()->id }}" method="post">
                @csrf
                @method('POST')
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label for="old_password">Password lama</label>
                                <input type="password" name="old_password" id="old_password"
                                    class="form-control @error('old_password') is-invalid
							@enderror">
                                @error('old_password')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="new_password">Password baru</label>
                                <input type="password" name="new_password" id="new_password"
                                    class="form-control @error('new_password') is-invalid
							@enderror">
                                @error('new_password')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end" style="gap: 10px">
                            <a href="/dashboard" class="btn btn-outline-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
