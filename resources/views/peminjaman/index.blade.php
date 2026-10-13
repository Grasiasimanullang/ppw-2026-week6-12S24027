<x-layout title="Sirkulasi Peminjaman">
    <h3 class="mb-4">Sirkulasi Peminjaman Buku</h3>

    <div class="card shadow-sm mb-4">
        <div class="card-header fw-semibold">Form Peminjaman Baru</div>
        <div class="card-body">
            <form action="{{ route('peminjaman.store') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-md-5">
                    <label class="form-label">Buku</label>
                    <select name="buku_id" class="form-select" required>
                        <option value="">-- Pilih buku --</option>
                        @foreach($bukus as $b)
                            <option value="{{ $b->id }}" @selected(old('buku_id') == $b->id)>
                                {{ $b->judul }} (stok: {{ $b->stok }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">NIM Peminjam</label>
                    <input type="text" name="nim_peminjam" value="{{ old('nim_peminjam') }}" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Nama Peminjam</label>
                    <input type="text" name="nama_peminjam" value="{{ old('nama_peminjam') }}" class="form-control" required>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-del">Pinjam Buku</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header fw-semibold">Riwayat Peminjaman</div>
        <div class="table-responsive">
            <table class="table table-striped align-middle mb-0">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Buku</th>
                        <th>Peminjam</th>
                        <th>Pinjam</th>
                        <th>Jatuh Tempo</th>
                        <th>Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($peminjamans as $p)
                        <tr>
                            <td>{{ $p->kode_pinjam }}</td>
                            <td>{{ $p->buku->judul }}</td>
                            <td>{{ $p->nim_peminjam }}<br><small class="text-muted">{{ $p->nama_peminjam }}</small></td>
                            <td>{{ $p->tanggal_pinjam }}</td>
                            <td>{{ $p->tanggal_jatuh_tempo }}</td>
                            <td>{{ $p->tanggal_kembali ?? '-' }}</td>
                            <td>
                                @if($p->status === 'dipinjam')
                                    <span class="badge text-bg-warning">Dipinjam</span>
                                @else
                                    <span class="badge text-bg-success">Dikembalikan</span>
                                @endif
                            </td>
                            <td>
                                @if($p->status === 'dipinjam')
                                    <form action="{{ route('peminjaman.kembalikan', $p->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-sm btn-outline-success">Kembalikan</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8" class="text-center text-muted py-4">Belum ada transaksi peminjaman.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">{{ $peminjamans->links() }}</div>
</x-layout>