@extends('blog.layouts.main')

@section('container')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        {{-- <img src="{{ asset('/image/hero5.png') }}" alt=""> --}}
    </section>
    <!-- End Hero -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container mb-5 pb-3">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <img src="/logo_bulat.png" class="img-fluid" width="25%" alt="himatif">
                </div>
            </div>
            <div class="row text-center justify-content-center mt-2">
                <h3>Startup Smart Generation Community</h3>
                <p>SGC USU merupakan sebuah organisasi yang aktif bergerak di banyak bidang. UKM ini melebarkan sayapnya
                    dengan melaksanakan pengabdian kepada masyarakat, menjadi entrepreneur, bahkan mengasah
                    anggota-anggotanya untuk mengikuti Pilmapres (Pemilihan Mahasiswa Berprestasi).</p>
            </div>
        </div>
        <div class="container">
            <div class="row content">
                <div class="col-lg-6 pb-5 pb-lg-0">
                    <img src="{{ url('/image/visi1.png') }}" class="img-fluid foto" alt="">
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h2>Profil</h2>
                                <p>Visi</p>
                            </div>
                            <p>
                                Terdepan dalam membentuk cendekiawan berkarakter islami untuk mewujudkan kampus usu yang
                                unggul dan berdaya saing nasional maupun internasional
                            </p>
                        </div>
                        <div class="col-12">
                            <div class="section-title">
                                <p>Misi</p>
                            </div>
                            <p>
                                Untuk mencapai visi tersebut, berikut beberapa misi yang dilakukan oleh HIMATIF UNIMAL :
                            </p>
                            <ul>
                                <li><i class="bi bi-check2-all text-warning"></i> Menerapkan manajemen mutu dalam
                                    pengelolaan sumber daya SGC USU</li>
                                <li><i class="bi bi-check2-all text-warning"></i> Mengoptimalkan sistem coaching ilmu dalam
                                    proses pembentukan karakter.</li>
                                <li><i class="bi bi-check2-all text-warning"></i> Mengembangkan dan mengoptimalkan lembaga
                                    keilmuan di tingkat fakultas</li>
                                <li><i class="bi bi-check2-all text-warning"></i> Memfasilitasi potensi peminatan dan karir
                                    anggota SGC USU.</li>
                                <li><i class="bi bi-check2-all text-warning"></i> Mengembangkan dan menerapkan jaringan SGC
                                    USU</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End About Section -->

    <!-- ======= teras Section ======= -->
    <section id="teras" class="teras" style="background: #08A243">
        <div class="container" data-aos="fade-up">


            <div class="content">
                <img src="/image/struktur.png" alt="" width="70%">
            </div>
            <div class="section-title-kanan">
                <h2>Struktur</h2>
                <p style="color: white">Struktur Organisasi</p>
                <h2>“Salam Cerdas, Hati Ikhlas, Kerja Keras, Maju Indonesia”</h2>
            </div>

        </div>
    </section><!-- End teras Section -->

    <!-- ======= teras Section ======= -->
    {{-- <section id="teras" class="teras">
        <div class="container" data-aos="fade-up">

            <div class="section-title-kanan">
                <h2>Pengurus</h2>
                <p>Pengurus Teras</p>
            </div>

            <div class="row content">
                @foreach ($divisi as $d)
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="pengurus">
                            <div class="pengurus-img">
                                <img src="{{ url('img/foto-pengurus/' . $d['foto']) }}" class="img-fluid" alt="">
                            </div>
                            <div class="pengurus-info">
                                <h4>{{ $d['nama'] }}</h4>
                                <span>{{ $d['jabatan'] }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section><!-- End teras Section --> --}}

    <!-- ======= divisi Section ======= -->
    <section id="Divisi" class="divisi">
        <div class="container">

            <div class="section-title">
                <h2>KEMENTRIAN</h2>
                <p>KEMENTRIAN</p>
            </div>

            <div class="row content">

                @foreach ($divisis as $divisi)
                    <div class="col-md-6 col-lg-6 d-flex align-items-stretch mb-3 mb-lg-4">
                        <div class="icon-box">
                            <h4 class="title"><a href="{{ route('divisi.show', $divisi->slug) }}">{{ $divisi->nama }}</a></h4>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section><!-- End divisi Section -->

    <!-- ======= divisi Section ======= -->
    <section id="berita" class="berita">
        <div class="container">

            <div class="section-title text-center">
                <p>Blogs</p>
                <span>Berita yang bermanfaat untuk dibaca</span>
            </div>
            <div class="row content">

                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="card">
                            <div class="image-container">
                                <img class="blog-image" src="{{ asset($post->featurePhoto) }}" alt="photo">
                            </div>
                            <div class="card-body">
                                <small class="bi bi-calendar-check"> {{ $post->formattedPublishedDate() }}</small>
                                <h4 class="title"><a href="/blogs/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                <p class="card-text">{{ Str::limit($post->sub_title, 255) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <a href="/blogs" class="btn btn-success tombol">Lihat Berita Lainnya <i
                            class="bi bi-arrow-right"></i></a>
                </div>
            </div>


        </div>
    </section><!-- End divisi Section -->

    <!-- kontak -->
    <section id="kontak" class="kontak">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-lg-5">
                            <div class="row">
                                <div class="col-lg-6 mb-5">
                                    <form action="/contact" method="post">
                                        @csrf
                                        <h3>Kontak Kami</h3>
                                        <div class="row g-2 mt-4 mb-3">
                                            <div class="col-md">
                                                <label for="name" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Nama" required>
                                            </div>
                                            <div class="col-md">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="Email" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="subject" class="form-label">Subjek</label>
                                            <input type="text" class="form-control" id="subject" name="subject"
                                                placeholder="Subjek" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="message" class="form-label">Pesan</label>
                                            <textarea class="form-control" id="message" name="message" rows="3" placeholder="Tulis Pesan Anda ..."
                                                required></textarea>
                                            </pre>
                                        </div>
                                        @if (Session::has('status'))
                                            <div class="alert alert-success">{{ Session::get('status') }}</div>
                                        @endif
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-success text-light mt-5" name="kirim"
                                                type="submit">Kirim</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-6">
                                    <h3>Hubungi Kami</h3>
                                    <div class="pt-1">
                                        <p><i class="bi bi-telephone-fill"></i> : +6282370601327 <br>
                                            <i class="bi bi-envelope-fill"></i> : sgc@usu <br>
                                        </p>
                                    </div>
                                    <h3 class="mt-4 pb-1">Lokasi Kami</h3>
                                    <div class="embed-responsive embed-responsive-21by9 ratio ratio-21x9 mb-5">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.1120041790705!2d98.6537673736411!3d3.5616759964125313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312fe03ed8450b%3A0xe84941c195268efc!2sUniversitas%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1716382430596!5m2!1sid!2sid"
                                            width="600" height="450" style="border:0;" allowfullscreen=""
                                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
