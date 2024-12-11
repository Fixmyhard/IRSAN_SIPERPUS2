<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Peminjaman Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="post" action="{{ route('borrowings.store') }}" class="mt-6 space-y-6">
                        @csrf

                        <!-- Pilihan Buku -->
                        <div class="max-w-xl">
                            <x-input-label for="book_id" value="Buku" />
                            <x-select-input id="book_id" name="book_id" class="mt-1 block w-full" required>
                                <option value="">Pilih Buku</option>
                                @foreach ($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('book_id')" />
                        </div>

                        <!-- Tanggal Jatuh Tempo -->
                        <div class="max-w-xl">
                            <x-input-label for="due_date" value="Tanggal Pinjam" />
                            <x-text-input id="due_date" type="date" name="due_date" class="mt-1 block w-full"
                                value="{{ old('due_date') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('due_date')" />
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="flex space-x-4">
                            <x-secondary-button tag="a" href="{{ route('borrowings.index') }}">Cancel</x-secondary-button>
                            <x-primary-button type="submit">Pinjam</x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
