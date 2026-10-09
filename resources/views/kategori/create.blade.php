<x-layout title="Tambah Kategori">
    <h3 class="mb-3">Tambah Kategori</h3>
    <form action="{{ route('kategori.store') }}" method="POST" class="bg-white p-4 shadow-sm rounded">
        @csrf
        @include('kategori._form')
    </form>
</x-layout>