<x-layout title="Edit Buku">
    <h3 class="mb-3">Edit Buku</h3>
    <form action="{{ route('buku.update', $buku) }}" method="POST" class="bg-white p-4 shadow-sm rounded">
        @csrf
        @method('PUT')
        @include('buku._form')
    </form>
</x-layout>