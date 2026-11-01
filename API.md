# Dokumentasi API Perpustakaan

| Method | URL | Body (jika ada) | Contoh Response |
|---|---|---|---|
| GET | `/api/books` | - | **200 OK**<br>`{"data": [{"id": 1, "judul": "Proklamasi dan Perjuangan", "stok": 1, "category": {"id": 5, "nama_kategori": "Sejarah"}}], "links": {"first": "http://127.0.0.1:8000/api/books?page=1", "last": "http://127.0.0.1:8000/api/books?page=1", "prev": null, "next": null}, "meta": {"current_page": 1, "per_page": 10, "total": 1}}` |
| GET | `/api/books?judul=laskar` | - | **200 OK**<br>`{"data": [{"id": 2, "judul": "Laskar Pelangi", "stok": 5, "category": {"id": 2, "nama_kategori": "Novel"}}], "links": {"first": "http://127.0.0.1:8000/api/books?page=1", "last": "http://127.0.0.1:8000/api/books?page=1"}, "meta": {"current_page": 1, "total": 1}}` |
| POST | `/api/books` | `{"judul": "Buku Baru", "category_id": 1, "isbn": "123", "tahun_terbit": 2026, "penulis": "Alifah", "penerbit": "PENS", "stok": 5}` | **201 Created**<br>`{"data": {"id": 3, "judul": "Buku Baru", "isbn": "123", "tahun_terbit": 2026, "penulis": "Alifah", "penerbit": "PENS", "stok": 5, "category_id": 1}}` |
| POST | `/api/books` | `{}` | **422 Unprocessable Content**<br>`{"message": "Judul wajib diisi. Stok wajib diisi.", "errors": {"judul": ["Judul wajib diisi."], "stok": ["Stok wajib diisi."]}}` |
| PUT | `/api/books/1` | `{"judul": "Judul Berubah", "stok": 10}` | **200 OK**<br>`{"data": {"id": 1, "judul": "Judul Berubah", "stok": 10, "category_id": 5}}` |
| DELETE | `/api/books/1` | - | **200 OK**<br>`{"message": "Data buku berhasil dihapus."}` |
| GET | `/api/books/999` | - | **404 Not Found**<br>`{"message": "No query results for model [App\\Models\\Book] 999"}` |
| GET | `/api/members` | - | **200 OK**<br>`{"data": [{"id": 1, "nama": "Budi", "email": "budi@pens.ac.id", "telepon": "0812345"}], "links": {"first": "http://127.0.0.1:8000/api/members?page=1", "last": "http://127.0.0.1:8000/api/members?page=1"}, "meta": {"current_page": 1, "total": 1}}` |
| GET | `/api/loans` | - | **200 OK**<br>`{"data": [{"id": 1, "tanggal_pinjam": "2026-10-23", "tanggal_kembali": "2026-10-30", "status": "dipinjam", "member": {"id": 1, "nama": "Budi"}, "user": {"id": 1, "name": "Admin"}, "books": [{"id": 2, "judul": "Laskar Pelangi"}]}]}` |
| POST | `/api/loans` | `{"member_id": 1, "user_id": 1, "tanggal_pinjam": "2026-10-23", "tanggal_kembali": "2026-10-30", "book_ids": [2]}` | **201 Created**<br>`{"data": {"id": 2, "member_id": 1, "user_id": 1, "tanggal_pinjam": "2026-10-23", "tanggal_kembali": "2026-10-30", "status": "dipinjam"}}` |
| PUT | `/api/loans/1/kembalikan` | - | **200 OK**<br>`{"data": {"id": 1, "status": "dikembalikan", "tanggal_kembali": "2026-10-30"}}` |
| GET | `/api/stats` | - | **200 OK**<br>`{"data": {"total_books": 10, "total_members": 5, "active_loans": 2}}` |