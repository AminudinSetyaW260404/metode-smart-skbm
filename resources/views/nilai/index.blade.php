<x-app-layout>
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-slate-800">Input Nilai & Ranking</h1>
        <p class="text-slate-500 mt-1">Masukkan nilai mahasiswa, lihat perhitungan SMART, dan ranking otomatis</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- KOLOM 1: INPUT NILAI --}}
        <div class="space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100">
                <div class="p-5 border-b border-slate-100">
                    <h2 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        Input Nilai
                    </h2>
                </div>
                <div class="p-5">
                    <form action="{{ route('nilai.store') }}" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-500 uppercase mb-1.5">Mahasiswa</label>
                                <select name="mahasiswa_id" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none" required>
                                    <option value="">Pilih Mahasiswa</option>
                                    @foreach ($mahasiswas as $m)
                                        <option value="{{ $m->id }}">{{ $m->nim }} - {{ $m->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-500 uppercase mb-1.5">Kriteria</label>
                                <select name="kriteria_id" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none" required>
                                    <option value="">Pilih Kriteria</option>
                                    @foreach ($kriterias as $k)
                                        <option value="{{ $k->id }}">{{ $k->nama }} ({{ $k->bobot }}%)</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-500 uppercase mb-1.5">Nilai (0-100)</label>
                                <input type="number" name="nilai" min="0" max="100" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none" placeholder="0" required>
                            </div>
                            <button type="submit" class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-sm transition text-sm">
                                Simpan Nilai
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- TABEL NILAI --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100">
                <div class="p-5 border-b border-slate-100">
                    <h2 class="text-lg font-bold text-slate-800">Data Nilai</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-slate-50">
                                <th class="px-4 py-2 text-left text-xs font-semibold text-slate-500">Mahasiswa</th>
                                <th class="px-4 py-2 text-left text-xs font-semibold text-slate-500">Kriteria</th>
                                <th class="px-4 py-2 text-center text-xs font-semibold text-slate-500">Nilai</th>
                                <th class="px-4 py-2 text-center text-xs font-semibold text-slate-500"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse ($mahasiswas as $m)
                                @foreach ($m->nilais as $n)
                                    <tr class="hover:bg-slate-50">
                                        <td class="px-4 py-2 text-slate-600">{{ $m->nama }}</td>
                                        <td class="px-4 py-2 text-slate-500">{{ $n->kriteria->nama }}</td>
                                        <td class="px-4 py-2 text-center font-bold text-slate-700">{{ $n->nilai }}</td>
                                        <td class="px-4 py-2 text-center">
                                            <form action="{{ route('nilai.destroy', $n) }}" method="POST" onsubmit="return confirm('Hapus?')">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-400 hover:text-red-600 transition">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @empty
                                <tr><td colspan="4" class="px-4 py-6 text-center text-slate-400 text-sm">Belum ada nilai</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- KOLOM 2: PERHITUNGAN SMART --}}
        <div class="space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <h2 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        Perhitungan SMART
                    </h2>
                    <form action="{{ route('nilai.hitung') }}" method="POST">
                        @csrf
                        <button type="submit" class="px-3 py-1.5 bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-semibold rounded-lg transition">Hitung Ulang</button>
                    </form>
                </div>
                <div class="p-5">
                    @if ($ranking->isEmpty())
                        <div class="text-center py-8">
                            <svg class="w-12 h-12 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                            <p class="text-slate-400 text-sm">Belum ada data perhitungan</p>
                        </div>
                    @else
                        <div class="space-y-3">
                            @foreach ($ranking as $i => $r)
                                <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center gap-2">
                                            <span class="text-lg">
                                                @if ($i === 0) 🥇
                                                @elseif ($i === 1) 🥈
                                                @elseif ($i === 2) 🥉
                                                @else <span class="text-sm font-bold text-slate-400">#{{ $i + 1 }}</span>
                                                @endif
                                            </span>
                                            <span class="font-semibold text-slate-800 text-sm">{{ $r['mahasiswa']->nama }}</span>
                                        </div>
                                        <span class="text-sm font-bold text-blue-600">{{ number_format($r['total_skor'], 4) }}</span>
                                    </div>
                                    <div class="w-full bg-slate-200 rounded-full h-2">
                                        <div class="bg-blue-500 h-2 rounded-full transition-all duration-500" style="width: {{ $r['total_skor'] * 100 }}%"></div>
                                    </div>
                                    <div class="mt-2 text-xs text-slate-500">
                                        @foreach ($r['detail'] as $d)
                                            {{ $d['kriteria'] }}: {{ number_format($d['skor'], 4) }}{{ $loop->last ? '' : ' + ' }}
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- KOLOM 3: RANKING --}}
        <div>
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100">
                <div class="p-5 border-b border-slate-100">
                    <h2 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                        <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        Ranking
                    </h2>
                </div>
                <div class="p-5">
                    @if ($ranking->isEmpty())
                        <div class="text-center py-8">
                            <svg class="w-12 h-12 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                            <p class="text-slate-400 text-sm">Belum ada ranking</p>
                        </div>
                    @else
                        <div class="space-y-3">
                            @foreach ($ranking as $i => $r)
                                @php
                                    $medal = match($i) {
                                        0 => ['bg' => 'bg-gradient-to-r from-amber-400 to-yellow-500', 'text' => 'text-white', 'label' => 'PENERIMA BEASISWA'],
                                        1 => ['bg' => 'bg-gradient-to-r from-slate-300 to-slate-400', 'text' => 'text-white', 'label' => 'CADANGAN 1'],
                                        2 => ['bg' => 'bg-gradient-to-r from-orange-300 to-orange-400', 'text' => 'text-white', 'label' => 'CADANGAN 2'],
                                        default => ['bg' => 'bg-slate-100', 'text' => 'text-slate-500', 'label' => ''],
                                    };
                                @endphp
                                <div class="p-4 rounded-xl border {{ $i < 3 ? 'border-transparent' : 'border-slate-100 bg-slate-50' }} {{ $i < 3 ? $medal['bg'] : '' }}">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full {{ $i < 3 ? 'bg-white/20' : 'bg-slate-200' }} flex items-center justify-center">
                                            <span class="text-sm font-bold {{ $i < 3 ? $medal['text'] : 'text-slate-500' }}">{{ $i + 1 }}</span>
                                        </div>
                                        <div class="flex-1">
                                            <p class="font-semibold text-sm {{ $i < 3 ? $medal['text'] : 'text-slate-700' }}">{{ $r['mahasiswa']->nama }}</p>
                                            <p class="text-xs {{ $i < 3 ? 'text-white/70' : 'text-slate-400' }}">{{ $r['mahasiswa']->nim }}</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="font-bold text-sm {{ $i < 3 ? $medal['text'] : 'text-slate-700' }}">{{ number_format($r['total_skor'], 4) }}</p>
                                            @if ($i < 3)
                                                <p class="text-xs text-white/70 font-semibold">{{ $medal['label'] }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
