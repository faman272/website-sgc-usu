@extends('blog.layouts.main')

@section('container')
    <!-- ======= Breadcrumbs ======= -->
    {{-- <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Kementrian</h2>
          <ol>
            <li>Home</li>
            <li>Kementrian</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs --> --}}

    {{-- Deskripsi Divisi --}}
    <section id="Pengurus" class="Pengurus teras">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Divisi</h2>
                        <p>{{ $divisi->nama }}</p>
                    </div>
                    <p>
                        {{ $divisi->deskripsi }}
                    </p>
                </div>

                <div class="section-title mt-4">
                    <h2>Pengurus</h2>
                    <p>PENGURUS</p>
                </div>

                <div class="row content justify-content-center">
                    @foreach ($anggotas as $anggota)
                        <div class="col-lg-2 col-md-6 d-flex align-items-stretch">
                            <div class="pengurus">
                                {{-- <div class="pengurus-img">
                                <img src='/' class="img-fluid" alt="">
                            </div> --}}
                                <div class="pengurus-info text-center">
                                    @if ($anggota->jk == 'L')
                                        <img src="/image/pria.png" alt="" width="40%" class="my-2">
                                    @else
                                        <img src="/image/wanita.png" alt="" width="40%" class="my-2">
                                    @endif
                                    <h4>{{ $anggota->nama }}</h4>
                                    <span>{{ $anggota->amanah->nama }}</span>
                                    {{-- <a href="">Details</a> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>
        </div>

    </section>

    <!-- ======= pengurusu Section ======= -->
    {{-- <section id="Pengurus" class="Pengurus teras">
        <div class="container">

            <div class="section-title">
                <h2>Pengurus</h2>
                <p>PENGURUS</p>
            </div>

            <div class="row content justify-content-center">
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="pengurus">
                        <div class="pengurus-img">
                            <img src='/' class="img-fluid" alt="">
                        </div>
                        <div class="pengurus-info">
                            <h4>Marcus Aurelius</h4>
                            <span>Menjabat</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Pengurus Section --> --}}

    {{-- <section class="progja">
    <div class="container">

      <div class="row justify-content-center">
        <div class="col-xl-10">
          <div class="section-title">
            <p>Program Kerja</p>
          </div>
          <ul class="progja-list">
            <li>
              <div class="data">Non consectetur a erat nam at lectus urna duis? </div>
            </li>
            <li>
              <div class="data">Non consectetur a erat nam at lectus urna duis? </div>
            </li>
            <li>
              <div class="data">Non consectetur a erat nam at lectus urna duis? </div>
            </li>
            <li>
              <div class="data">Non consectetur a erat nam at lectus urna duis? </div>
            </li>
            <li>
              <div class="data">Non consectetur a erat nam at lectus urna duis? </div>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </section><!-- End Pengurus Section --> --}}
@endsection
