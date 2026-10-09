<x-layout :title="$kategori->nama_kategori">
    <div class="bg-white p-4 shadow-sm rounded">
        <h3>{{ $kategori->nama_kategori }} <small class="text-muted">({{ $kategori->kode_kategori }})</small></h3>
        <h6 class="mt-4">Buku dalam kategori ini</h6>
        <ul>
            @forelse($kategori->bukus as $buku)
                <li><a href="{{ route('buku.show', $buku) }}">{{ $buku->judul }}</a></li>
            @empty
                <li class="text-muted">Belum ada buku.</li>
            @endforelse
        </ul>
        <a href="{{ route('kategori.index') }}" class="btn btn-outline-secondary">Kembali</a>
    </div>
</x-layout>