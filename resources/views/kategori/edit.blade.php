<x-layout title="Edit Kategori">
    <h3 class="mb-3">Edit Kategori</h3>
    <form action="{{ route('kategori.update', $kategori) }}" method="POST" class="bg-white p-4 shadow-sm rounded">
        @csrf
        @method('PUT')
        @include('kategori._form')
    </form>
</x-layout>