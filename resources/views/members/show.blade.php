<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Anggota</title>
    <style>
        body { font-family: sans-serif; margin: 40px; max-width: 600px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { padding: 10px 0; text-align: left; border-bottom: 1px solid #eee; }
        th { width: 35%; color: #333; }
        a { color: #2563eb; text-decoration: none; }
        a:hover { text-decoration: underline; }
        .btn { display: inline-block; margin-top: 25px; padding: 8px 16px; background: #2563eb; color: #fff; border-radius: 4px; text-decoration: none; }
        .btn:hover { background: #1d4ed8; text-decoration: none; }
    </style>
</head>
<body>
    <h1>Detail Anggota</h1>
    
    <p><a href="{{ route('members.index') }}">&larr; Kembali ke daftar anggota</a></p>

    <table>
        <tr>
            <th>ID</th>
            <td>: {{ $member->id }}</td>
        </tr>
        <tr>
            <th>Nama Lengkap</th>
            <td>: {{ $member->nama }}</td>
        </tr>
        <tr>
            <th>NIM</th>
            <td>: {{ $member->nim }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>: {{ $member->email }}</td>
        </tr>
        <tr>
            <th>No. Telepon</th>
            <td>: {{ $member->nomor_telepon ?? '-' }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>: {{ $member->alamat ?? '-' }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>: {{ ucfirst($member->status) }}</td>
        </tr>
    </table>

</body>
</html>