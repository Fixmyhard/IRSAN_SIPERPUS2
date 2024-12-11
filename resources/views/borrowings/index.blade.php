<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Borrowings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Tombol Tambah Peminjaman -->
                    <x-primary-button tag="a" href="{{ route('borrowings.create') }}">Tambah Peminjaman</x-primary-button>
                    
                    <!-- Tabel Peminjaman -->
                    <x-table>
                        <x-slot name="header">
                            <tr class="py-10">
                                <th scope="col">#</th>
                                <th scope="col">Buku</th>
                                <th scope="col">Anggota</th>
                                <th scope="col">Tanggal Pinjam</th>
                                <th scope="col">Tanggal Jatuh Tempo</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </x-slot>
                    
                        @foreach ($borrowings as $borrowing)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $borrowing->book->title }}</td>
                                <td>{{ $borrowing->user->name }}</td>
                                <td>{{ $borrowing->borrowed_at }}</td>
                                <td>{{ $borrowing->due_date }}</td>
                                <td>{{ $borrowing->returned_at ? 'Dikembalikan' : 'Dipinjam' }}</td>
                                <td>
                                    <!-- Aksi Kembalikan -->
                                    @if (!$borrowing->returned_at)
                                        <form action="{{ route('borrowings.return', $borrowing->id) }}" method="POST">
                                            @csrf
                                            <x-primary-button type="submit">
                                                Kembalikan
                                            </x-primary-button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </x-table>

                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $borrowings->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
