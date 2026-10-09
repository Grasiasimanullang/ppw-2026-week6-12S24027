<x-layout title="Daftar Buku">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Daftar Buku</h3>
        <a href="{{ route('buku.create') }}" class="btn btn-del">+ Tambah Buku</a>
    </div>

    <div class="table-responsive bg-white shadow-sm rounded">
        <table class="table table-striped align-middle mb-0">
            <thead>
                <tr>
                    <th>ISBN</th><th>Judul</th><th>Penulis</th>
                    <th>Kategori</th><th>Stok</th><th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bukus as $buku)
                    <tr>
                        <td>{{ $buku->isbn }}</td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->penulis }}</td>
                        <td>{{ $buku->kategori->nama_kategori }}</td>
                        <td>{{ $buku->stok }}</td>
                        <td class="text-end">
                            <a href="{{ route('buku.show', $buku) }}" class="btn btn-sm btn-outline-secondary">Detail</a>
                            <a href="{{ route('buku.edit', $buku) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('buku.destroy', $buku) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Hapus buku ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted py-4">Belum ada data buku.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">{{ $bukus->links() }}</div>
</x-layout>