<x-layout title="Tambah Buku">
    <h3 class="mb-3">Tambah Buku</h3>
    <form action="{{ route('buku.store') }}" method="POST" class="bg-white p-4 shadow-sm rounded">
        @csrf
        @include('buku._form')
    </form>
</x-layout>