<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Nilai') }}
    </x-slot>

    <div class="card">
        <div class="card-header">
            <h3 class="text-lg font-semibold text-slate-800">Form Edit Nilai</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('nilai.update', $nilai) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="form-label">Mahasiswa</label>
                        <select name="mahasiswa_id" class="form-control" required>
                            <option value="">Pilih Mahasiswa</option>
                            @foreach ($mahasiswas as $mahasiswa)
                                <option value="{{ $mahasiswa->id }}" {{ $nilai->mahasiswa_id == $mahasiswa->id ? 'selected' : '' }}>{{ $mahasiswa->nim }} - {{ $mahasiswa->nama }}</option>
                            @endforeach
                        </select>
                        @error('mahasiswa_id')
                            <span class="text-sm text-[#EF4444] mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="form-label">Kriteria</label>
                        <select name="kriteria_id" class="form-control" required>
                            <option value="">Pilih Kriteria</option>
                            @foreach ($kriterias as $kriteria)
                                <option value="{{ $kriteria->id }}" {{ $nilai->kriteria_id == $kriteria->id ? 'selected' : '' }}>{{ $kriteria->nama }}</option>
                            @endforeach
                        </select>
                        @error('kriteria_id')
                            <span class="text-sm text-[#EF4444] mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="form-label">Nilai (0-100)</label>
                        <input type="number" step="0.01" name="nilai" value="{{ $nilai->nilai }}" class="form-control" min="0" max="100" required>
                        @error('nilai')
                            <span class="text-sm text-[#EF4444] mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 flex space-x-3">
                    <button type="submit" class="btn btn-primary">
                        <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Update
                    </button>
                    <a href="{{ route('nilai.index') }}" class="btn btn-secondary">
                        <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
