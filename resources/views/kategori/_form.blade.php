<div class="row g-3">
    <div class="col-md-4">
        <label class="form-label">Kode Kategori</label>
        <input type="text" name="kode_kategori" class="form-control"
               value="{{ old('kode_kategori', $kategori->kode_kategori ?? '') }}">
    </div>
    <div class="col-md-8">
        <label class="form-label">Nama Kategori</label>
        <input type="text" name="nama_kategori" class="form-control"
               value="{{ old('nama_kategori', $kategori->nama_kategori ?? '') }}">
    </div>
</div>
<div class="mt-4">
    <button type="submit" class="btn btn-del">Simpan</button>
    <a href="{{ route('kategori.index') }}" class="btn btn-outline-secondary">Batal</a>
</div>