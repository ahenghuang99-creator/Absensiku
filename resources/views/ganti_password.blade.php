@include('header')

<div class="container d-flex justify-content-center mt-5">
    <div class="card shadow" style="width: 500px; border-radius:15px; overflow:hidden;">

        <!-- Header -->
        <div style="background: linear-gradient(90deg,#2c4f8c,#3a63b8); padding:20px;">
            <h4 class="text-white m-0">Ganti Password</h4>
        </div>

        <!-- Body -->
        <div class="card-body p-4">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('update.password') }}" method="POST">
                @csrf

                <!-- Password Lama -->
                <div class="mb-3">
                    <label class="form-label">Password Lama</label>
                    <input type="password" name="old_password" class="form-control" required>
                </div>

                <!-- Password Baru -->
                <div class="mb-3">
                    <label class="form-label">Password Baru</label>
                    <input type="password" name="new_password" class="form-control" required>
                </div>

                <!-- Konfirmasi Password -->
                <div class="mb-4">
                    <label class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" name="new_password_confirmation" class="form-control" required>
                </div>

                <!-- Button -->
                <div class="d-flex justify-content-between">
                    <a href="{{ url('/akun') }}" class="btn btn-secondary px-4">
                        Kembali
                    </a>

                    <button type="submit" class="btn text-white px-4"
                        style="background-color:#2c4f8c;">
                        Simpan Perubahan
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

@include('footer')