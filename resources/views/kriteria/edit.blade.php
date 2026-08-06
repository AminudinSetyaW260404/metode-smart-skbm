@php $kriteria = $kriteria ?? null; @endphp
<x-app-layout>
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-slate-800">Edit Kriteria</h1>
        <p class="text-slate-500 mt-1">Ubah data kriteria penilaian</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8 max-w-2xl">
        <form action="{{ route('kriteria.update', $kriteria) }}" method="POST">
            @csrf @method('PUT')

            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Kriteria</label>
                    <input type="text" name="nama" value="{{ old('nama', $kriteria->nama) }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition" required>
                    @error('nama') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Bobot (%)</label>
                        <input type="number" step="0.01" name="bobot" value="{{ old('bobot', $kriteria->bobot) }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition" min="0" max="100" required>
                        @error('bobot') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Tipe</label>
                        <select name="tipe" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition" required>
                            <option value="benefit" {{ old('tipe', $kriteria->tipe) === 'benefit' ? 'selected' : '' }}>Benefit (↑ lebih baik)</option>
                            <option value="cost" {{ old('tipe', $kriteria->tipe) === 'cost' ? 'selected' : '' }}>Cost (↓ lebih baik)</option>
                        </select>
                        @error('tipe') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <div class="flex gap-3 mt-8">
                <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-sm transition">Update</button>
                <a href="{{ route('kriteria.index') }}" class="px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl transition">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
