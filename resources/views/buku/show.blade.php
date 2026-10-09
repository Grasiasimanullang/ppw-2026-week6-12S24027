<x-layout :title="$buku->judul">
    <div class="bg-white p-4 shadow-sm rounded">
        <h3>{{ $buku->judul }}</h3>
        <dl class="row mt-3">
            <dt class="col-sm-3">ISBN</dt><dd class="col-sm-9">{{ $buku->isbn }}</dd>
            <dt class="col-sm-3">Penulis</dt><dd class="col-sm-9">{{ $buku->penulis }}</dd>
            <dt class="col-sm-3">Penerbit</dt><dd class="col-sm-9">{{ $buku->penerbit }}</dd>
            <dt class="col-sm-3">Tahun Terbit</dt><dd class="col-sm-9">{{ $buku->tahun_terbit }}</dd>
            <dt class="col-sm-3">Kategori</dt><dd class="col-sm-9">{{ $buku->kategori->nama_kategori }}</dd>
            <dt class="col-sm-3">Stok</dt><dd class="col-sm-9">{{ $buku->stok }}</dd>
            <dt class="col-sm-3">Sinopsis</dt><dd class="col-sm-9">{{ $buku->sinopsis ?: '-' }}</dd>
        </dl>
        <a href="{{ route('buku.index') }}" class="btn btn-outline-secondary">Kembali</a>
    </div>
</x-layout>