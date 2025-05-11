@if (auth()->user()->hasRole('admin'))
    @extends('layouts.dashboard-layout')
    @section('title', $title)
    @section('content')
        <!-- Content row -->

        <!-- partial -->
        <div class="row my-3">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome {{ Auth()->user()->roles }}</h3>
                        <h6 class="font-weight-normal mb-0">Pada Dashboard Koperasi Konsumen Karlisna PLN
                            Yogyakarta</h6>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white" type="button" id="dropdownMenuDate2"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span id="currentDateTime">{{ $currentDateTime }}</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('dashboard.export.pdf') }}">
                        <i class="fas fa-file-pdf"></i> Export PDF
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <x-card-bendahara title="Saldo Pinjaman" icon="fas fa-wallet" :data="$emergency" />
            <x-card-bendahara title="Saldo Pinjaman" icon="fas fa-wallet" :data="$angunan" />
            <x-card-bendahara title="Saldo Pinjaman" icon="fas fa-wallet" :data="$nonangunan" />
            <x-card-bendahara title="Total Pinjaman" icon="fas fa-wallet" :data="$totalLoans" />
            <x-card-bendahara title="Total Simpanan" icon="fas fa-wallet" :data="$simpanan" />
        </div>
        <x-script-time />
    @endsection
@endif
