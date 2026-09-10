<!DOCTYPE html>
<html>
<head><title>Dashboard Admin</title></head>
<body>
    <h2>Selamat Datang, Admin {{ auth()->user()->name }}!</h2>
    <p>Ini adalah halaman utama khusus admin. Anda bisa mengelola SRS-08 di sini.</p>
    
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>