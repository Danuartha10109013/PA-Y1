
@if (auth()->user()->roles == 'anggota')
    @extends('layouts.dashboard-layout')
    @section('title', $title)
    @section('content')
        <div class="content-background" style="background: white">
            <a href="{{ route('anggota.nonangunan.create') }}">
                <button class="btn btn-primary my-4">Ajukan Pinjaman</button>
            </a>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead style="background-color: #EEEEEE;">
                        <tr>
                            <th>No</th>
                            <th>Nomor Pinjaman</th>
                            <th>Nama</th>
                            <th>Nominal Pinjaman</th>
                            <th>Jangka Waktu Peminjaman</th>
                            <th>Tujuan Pinjaman</th>
                            <th>Nomor Rekening</th>
                            <th>Nominal Angsuran Perbulan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pinjamans as $key => $pinjaman)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pinjaman->nomor_pinjaman }}</td>
                                <td>{{ $pinjaman->user->name }}</td>
                                <td>Rp. {{ number_format($pinjaman->amount, 2) }}</td>
                                <td>{{ $pinjaman->jangka_waktu }}</td>
                                <td>{{ $pinjaman->keterangan }}</td>
                                <td>
                                    {{ $pinjaman->virtualAccount->virtual_account_number ?? 'N/A' }}
                                </td>
                                <td>Rp. {{ number_format($pinjaman->nominal_angsuran, 2) }}</td>
                                <td>
                                    <x-status-badge
                                        :statusKetua="$pinjaman->status_ketua"
                                        :statusManager="$pinjaman->status_manager"
                                        :statusBendahara="$pinjaman->status_bendahara"
                                    />
                                </td>
                                <td class="action-icons">
                                    <a href="{{ route('pinjaman.detail.uuid', $pinjaman->uuid) }}">
                                        <i class="fas fa-eye text-success"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>

    @endsection
@endif
>>>>>>> origin/main
