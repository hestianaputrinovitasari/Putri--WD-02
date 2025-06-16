<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Obat Terhapus') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                <section>
                    <header class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Daftar Obat Terhapus') }}
                        </h2>
                        <a href="{{ route('dokter.obat.index') }}" class="px-3 py-1 text-sm bg-secondary text-white rounded hover:bg-gray-700">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </header>

                    <!-- Notifikasi status -->
                    @if (session('status'))
                        <div class="mb-4 text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Tombol Restore Semua dan Hapus Semua Permanen -->
                    <div class="flex space-x-2 mb-4">
                        <form method="POST" action="{{ route('dokter.obat.restore-all') }}">
                            @csrf
                            <button class="px-3 py-1 bg-primary text-white rounded hover:bg-blue-600">
                                <i class="fas fa-undo-alt"></i> Restore Semua
                            </button>
                        </form>

                        <form method="POST" action="{{ route('dokter.obat.force-delete-all') }}" onsubmit="return confirm('Yakin hapus semua obat secara permanen?')">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 bg-danger text-white rounded hover:bg-red-700">
                                <i class="fas fa-trash-alt"></i> Hapus Semua Permanen
                            </button>
                        </form>
                    </div>

                    <table class="table table-bordered table-striped w-full">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Obat</th>
                                <th>Kemasan</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($obats as $obat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $obat->nama_obat }}</td>
                                    <td>{{ $obat->kemasan }}</td>
                                    <td>Rp{{ number_format($obat->harga, 0, ',', '.') }}</td>
                                    <td>
                                        <!-- Tombol Restore -->
                                        <form method="POST" action="{{ route('dokter.obat.restore', $obat->id) }}" style="display:inline-block;">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="fas fa-undo-alt"></i> Restore
                                            </button>
                                        </form>

                                        <!-- Tombol Hapus Permanen -->
                                        <form method="POST" action="{{ route('dokter.obat.force-delete', $obat->id) }}" style="display:inline-block;" onsubmit="return confirm('Yakin hapus permanen?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada obat yang terhapus.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
