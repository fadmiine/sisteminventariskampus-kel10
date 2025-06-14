@extends('main', ['pageSlug' => 'peminjaman'])

@section('content')
<div class="card">
    <div class="card-header"><h4>Form Peminjaman</h4></div>
    <div class="card-body">
        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama Barang</label>
                <select name="inventaris_id" id="inventaris_id" class="form-control" required>
                    <option value="">-- Pilih Barang --</option>
                    @foreach ($barang as $b)
                        <option value="{{ $b->id }}" data-stok="{{ $b->jumlah }}">
                            {{ $b->nama_barang }} (Stok: {{ $b->jumlah }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Jumlah Pinjam</label>
                <input
                  type="number"
                  name="jumlah_pinjam"
                  id="jumlah_pinjam"
                  class="form-control"
                  value="1"
                  min="1"
                  required
                >
            </div>

            <div class="form-group">
                <label>Tanggal Pinjam</label>
                <input
                  type="date"
                  name="tanggal_pinjam"
                  id="tanggal_pinjam"
                  class="form-control"
                  value="{{ date('Y-m-d') }}"
                  required
                >
            </div>

            <div class="form-group">
                <label>Tanggal Kembali (otomatis +3 hari)</label>
                <input
                  type="date"
                  name="tanggal_kembali"
                  id="tanggal_kembali"
                  class="form-control"
                  readonly
                >
            </div>

            <button type="submit" class="btn btn-primary">Ajukan</button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const pinjam = document.getElementById('tanggal_pinjam');
  const kembali = document.getElementById('tanggal_kembali');
  const jumlahPinjam = document.getElementById('jumlah_pinjam');
  const select = document.getElementById('inventaris_id');

  function updateKembali() {
    const d = new Date(pinjam.value);
    d.setDate(d.getDate() + 3);
    kembali.value = d.toISOString().slice(0,10);
  }

  function validateJumlah() {
    const stok = parseInt(select.selectedOptions[0].dataset.stok || 0, 10);
    let jumlah = parseInt(jumlahPinjam.value, 10);
    if (jumlah > stok) {
      alert('Jumlah pinjam melebihi stok tersedia!');
      jumlahPinjam.value = stok;
    }
  }

  pinjam.addEventListener('change', updateKembali);
  jumlahPinjam.addEventListener('input', validateJumlah);
  select.addEventListener('change', validateJumlah);

  // initialize
  updateKembali();
});
</script>
@endsection
