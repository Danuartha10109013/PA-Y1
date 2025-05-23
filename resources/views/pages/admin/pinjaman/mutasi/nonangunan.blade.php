@if (auth()->user()->roles == 'admin')
    @extends('layouts.dashboard-layout')
    @section('title', $title)
    @section('content')
        <div class="content-background" style="background: white">
            <form>
                <div class="d-flex flex-row">
                    <input type="date" class="form-control mr-2" style="width: 200px;" name="start_date"
                        value="{{ request('start_date') }}" />
                    <input type="date" class="form-control mr-2" style="width: 200px;" name="end_date"
                        value="{{ request('end_date') }}" />

                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>
            <div class="icons d-flex flex-row-reverse mb-3 align-items-center">
                <a
                    href="{{ route('export.pdf', array_merge(request()->only(['start_date', 'end_date']), ['jenisPinjaman' => 'pinjaman_emergency'])) }}">
                    <i class="fas fa-file-pdf"></i>
                </a>
                <a
                    href="{{ route('export.excel', array_merge(request()->only(['start_date', 'end_date']), ['jenisPinjaman' => 'pinjaman_emergency'])) }}">
                    <i class="fas fa-file-excel"></i>
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead bgcolor="EEEEEE">
                        <tr>
                            <th>Nama Anggota</th>
                            <th>Nomor Pinjaman</th>
                            <th>Jenis Pinjaman</th>
                            <th>Pokok Pinjaman</th>
                            <th>Tenor</th>
                            <th>Angsuran Pokok</th>
                            <th>Tanggal Pengajuan</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pinjamanNonAngunan as $key => $data)
                            <tr>
                                <td>{{ $data->user->name }}</td>
                                <td>{{ $data->nomor_pinjaman }}</td>
                                <td>{{ ucwords(str_replace('_', ' ', $data->jenis_pinjaman)) }}</td>
                                <td>Rp. {{ number_format($data->amount, 2) }}</td>
                                <td>{{ $data->jangka_waktu }} Bulan</td>
                                <td>Rp. {{ number_format($data->nominal_angsuran, 2) }}</td>
                                <td>{{ $data->created_at->format('d-m-Y') }}</td>
                                {{-- <td class="action-icons">
                                    <i class="fas fa-edit edit"></i>
                                    <i class="fas fa-trash delete"></i>
                                </td> --}}
                            @empty
                                <h4 class="text-center font-weight-bold">Tidak ada data tersedia</h4>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <style>
                .icons i {
                    font-size: 24px;
                    color: #007bff;
                    margin-right: 12px;
                    transition: color 0.3s ease;
                }

                .icons i:hover {
                    color: #007bff;
                }

                .action-icons i {
                    font-size: 20px;
                    cursor: pointer;
                    margin-right: 8px;
                    transition: color 0.3s ease;
                }

                .action-icons i.edit {
                    color: #007bff;
                }

                .action-icons i.delete {
                    color: #dc3545;
                }

                .action-icons i.detail {
                    color: #007bff;
                }

                .action-icons i:hover {
                    opacity: 0.7;
                }

                h4 {
                    margin-bottom: 20px;
                    text-align: center;
                }

                .table-responsive {
                    overflow-x: auto;
                    margin-bottom: 20px;
                }

                .action-icons {
                    text-align: center;
                    display: flex;
                    justify-content: space-evenly;
                    align-items: center;
                }

                .action-icons i {
                    cursor: pointer;
                    color: #007bff;
                    font-size: 18px;
                }

                .action-icons i:hover {
                    color: #dc3545;
                }

                .content-background {
                    padding: 20px;
                }

                .search-bar {
                    margin-bottom: 20px;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }

                .search-bar input {
                    max-width: 300px;
                }
            </style>
        @endsection
@endif
