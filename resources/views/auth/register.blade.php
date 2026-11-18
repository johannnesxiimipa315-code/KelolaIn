<x-layout title="Daftar | KelolaUang">
    <section class="auth-card">
        <p class="eyebrow">Mulai lebih teratur</p>
        <h1>Buat akun KelolaUang.</h1>
        <p class="muted">Simpan catatan pemasukan dan pengeluaranmu dengan aman.</p>
        @if ($errors->any())
            <div class="error-box" role="alert"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
        @endif
        <form method="post" action="{{ route('register.store') }}" class="form-stack">
            @csrf
            <label>Nama<input type="text" name="nama" value="{{ old('nama') }}" required autofocus></label>
            <label>Email<input type="email" name="email" value="{{ old('email') }}" required></label>
            <label>Password<input type="password" name="password" required minlength="8"></label>
            <label>Konfirmasi password<input type="password" name="password_confirmation" required minlength="8"></label>
            <button class="primary-action" type="submit">Buat akun</button>
        </form>
        <p class="muted">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>.</p>
    </section>
</x-layout>
