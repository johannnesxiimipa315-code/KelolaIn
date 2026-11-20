<x-layout title="Masuk | KelolaIn">
    <section class="auth-card">
        <p class="eyebrow">KelolaIn</p>
        <h1>Masuk ke catatan keuanganmu.</h1>
        <p class="muted">Lihat saldo dan kelola transaksi pribadi dalam satu tempat.</p>
        @if ($errors->any())
            <div class="error-box" role="alert">{{ $errors->first() }}</div>
        @endif
        <form method="post" action="{{ route('login.store') }}" class="form-stack">
            @csrf
            <label>Email<input type="email" name="email" value="{{ old('email') }}" required autofocus></label>
            <label>Password<input type="password" name="password" required></label>
            <label class="check-row"><input type="checkbox" name="remember" value="1"> Ingat saya</label>
            <button class="primary-action" type="submit">Masuk</button>
        </form>
        <p class="muted">Belum punya akun? <a href="{{ route('register') }}">Buat akun</a>.</p>
    </section>
</x-layout>
