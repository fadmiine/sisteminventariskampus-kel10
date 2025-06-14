@extends('main', ['pageSlug' => 'create_staff'])

@section('content')

<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Staff</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Barang</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <input type="text" name="kategori" id="kategori" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" name="harga" id="harga" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" name="stok" id="stok" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto Barang</label><br>
                            <label for="foto" class="btn btn-secondary">Upload Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control-file d-none" accept="image/*" onchange="previewFoto(event)">
                            <div id="preview-container" class="mt-2">
                                <!-- Pratinjau akan muncul di sini -->
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewFoto(event) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById('preview-container');
            previewContainer.innerHTML = ''; // Bersihkan kontainer pratinjau

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'Foto Pratinjau';
                    img.className = 'img-thumbnail';
                    img.style.width = '150px';
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        }
    </script>

@endsection