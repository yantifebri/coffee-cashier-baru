@extends('templates.layout')

@push('style')
@endpush

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Dashboard - NiceAdmin Bootstrap Template</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="/css/style.css" rel="stylesheet">

                                                                                                                                                                                     ======================================================== -->
    </head>

    <body>
        <!-- ======= Sidebar ======= -->

        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Dashboard</h1>

            </div><!-- End Page Title -->

            <section class="section dashboard">
                <div class="row">

                    <!-- Left side columns -->
                    <div class="col-lg-8">
                        <div class="row">

                            <!-- Sales Card -->
                            <div class="col-xxl-4 col-md-6">
                                <div class="card info-card sales-card">
                                    <div class="card-body ">
                                        <h5 class="card-title">Jumlah Menu</h5>
                                        <div class="d-flex align-items-center" style="width: 40px">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-menu-button-fill"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h2 class="count">{{ $data['count_menu'] }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Sales Card -->
                            <div class="col-xxl-4 col-md-6">
                                <div class="card info-card sales-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Jumlah Pendapatan</h5>
                                        <div class="d-flex align-items-center" style="width: 40px">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-coin"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>Rp.{{ number_format($data['pendapatan'], 0, ',', '.') }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Revenue Card -->
                            {{-- <div class="col-xxl-4 col-md-6">
                                <div class="card info-card revenue-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Nama pelanggan</h5>

                                        <div class="d-flex align-items-center">
                                            @foreach ($pelanggan as $p)
                                                <div class="media-body">
                                                    <a class="title" href="#">Nama: {{ $p->nama }}</a>
                                                    <p>Email: {{ $p->email }}</p>
                                                    <p>Alamat: {{ $p->alamat }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Revenue Card --> --}}

                            <!-- Customers Card -->
                            <div class="col-xxl-4 col-xl-12">

                                {{-- <div class="card info-card customers-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Customers <span>| This Year</span></h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-people"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>1244</h6>


                                            </div>
                                        </div>

                                    </div>
                                </div> --}}
                            </div><!-- End Customers Card -->
                            <!-- Reports -->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Grafik Pendapatan</h5>

                                        <!-- Line Chart -->
                                        <div id="reportsChart"></div>

                                        <script>
                                            document.addEventListener("DOMContentLoaded", () => {
                                                // Data pendapatan dari controller
                                                const tanggal = @json($data['tanggal']);
                                                const pendapatan = @json($data['dataPendapatan']);

                                                new ApexCharts(document.querySelector("#reportsChart"), {
                                                    series: [{
                                                        name: 'Pendapatan',
                                                        data: pendapatan,
                                                    }],
                                                    chart: {
                                                        height: 350,
                                                        type: 'area',
                                                        toolbar: {
                                                            show: false
                                                        },
                                                    },
                                                    markers: {
                                                        size: 4
                                                    },
                                                    colors: ['#4154f1'],
                                                    fill: {
                                                        type: "line",
                                                        gradient: {
                                                            shadeIntensity: 1,
                                                            opacityFrom: 0.3,
                                                            opacityTo: 0.4,
                                                            stops: [0, 90, 100]
                                                        }
                                                    },
                                                    dataLabels: {
                                                        enabled: false
                                                    },
                                                    stroke: {
                                                        curve: 'smooth',
                                                        width: 2
                                                    },
                                                    xaxis: {
                                                        type: 'datetime',
                                                        categories: tanggal
                                                    },
                                                    tooltip: {
                                                        x: {
                                                            format: 'dd/MM/yy'
                                                        },
                                                    }
                                                }).render();
                                            });
                                        </script>
                                        <!-- End Line Chart -->

                                    </div>
                                </div>
                            </div>

                            <!-- End Reports -->

                            <!-- Recent Sales -->
                            {{-- <div class="col-12">
                                <div class="card recent-sales overflow-auto">

                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <li class="dropdown-header text-start">
                                                <h6>Filter</h6>
                                            </li>

                                            <li><a class="dropdown-item" href="#">Today</a></li>
                                            <li><a class="dropdown-item" href="#">This Month</a></li>
                                            <li><a class="dropdown-item" href="#">This Year</a></li>
                                        </ul>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title">Recent Sales <span>| Today</span></h5>

                                        <table class="table table-borderless datatable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Customer</th>
                                                    <th scope="col">Product</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row"><a href="#">#2457</a></th>
                                                    <td>Brandon Jacob</td>
                                                    <td><a href="#" class="text-primary">At praesentium minu</a>
                                                    </td>
                                                    <td>$64</td>
                                                    <td><span class="badge bg-success">Approved</span></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><a href="#">#2147</a></th>
                                                    <td>Bridie Kessler</td>
                                                    <td><a href="#" class="text-primary">Blanditiis dolor omnis
                                                            similique</a></td>
                                                    <td>$47</td>
                                                    <td><span class="badge bg-warning">Pending</span></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><a href="#">#2049</a></th>
                                                    <td>Ashleigh Langosh</td>
                                                    <td><a href="#" class="text-primary">At recusandae
                                                            consectetur</a></td>
                                                    <td>$147</td>
                                                    <td><span class="badge bg-success">Approved</span></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><a href="#">#2644</a></th>
                                                    <td>Angus Grady</td>
                                                    <td><a href="#" class="text-primar">Ut voluptatem id earum
                                                            et</a></td>
                                                    <td>$67</td>
                                                    <td><span class="badge bg-danger">Rejected</span></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><a href="#">#2644</a></th>
                                                    <td>Raheem Lehner</td>
                                                    <td><a href="#" class="text-primary">Sunt similique
                                                            distinctio</a></td>
                                                    <td>$165</td>
                                                    <td><span class="badge bg-success">Approved</span></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                            </div><!-- End Recent Sales --> --}}

                            <!-- Top Selling -->
                            {{-- <div class="col-6">
                                <div class="card recent-transactions overflow-auto">
                                    <div class="card-body">
                                        <h5 class="card-title">Riwayat Transaksi Terbaru</h5>

                                        <div class="activity">
                                            <!-- Transaksi item 1 -->
                                            <div class="activity-item d-flex">
                                                <div class="activity-photo">
                                                    <img src="foto_produk_1.jpg" alt="Produk 1" class="img-thumbnail"
                                                        width="50">
                                                </div>
                                                <div class="activity-content ms-3">
                                                    <div class="fw-bold">Nama Produk 1</div>
                                                    <div class="text-muted">Harga: Rp 100.000</div>
                                                    <div class="text-muted">Qty: 2</div>
                                                </div>
                                            </div><!-- End transaksi item-->

                                            <!-- Transaksi item 2 -->
                                            <div class="activity-item d-flex">
                                                <div class="activity-photo">
                                                    <img src="foto_produk_2.jpg" alt="Produk 2" class="img-thumbnail"
                                                        width="50">
                                                </div>
                                                <div class="activity-content ms-3">
                                                    <div class="fw-bold">Nama Produk 2</div>
                                                    <div class="text-muted">Harga: Rp 50.000</div>
                                                    <div class="text-muted">Qty: 3</div>
                                                </div>
                                            </div><!-- End transaksi item-->

                                            <!-- Transaksi item 3 -->
                                            <div class="activity-item d-flex">
                                                <div class="activity-photo">
                                                    <img src="foto_produk_3.jpg" alt="Produk 3" class="img-thumbnail"
                                                        width="50">
                                                </div>
                                                <div class="activity-content ms-3">
                                                    <div class="fw-bold">Nama Produk 3</div>
                                                    <div class="text-muted">Harga: Rp 75.000</div>
                                                    <div class="text-muted">Qty: 1</div>
                                                </div>
                                            </div><!-- End transaksi item-->
                                        </div>
                                    </div>
                                </div>
                            </div> --}}



                            <!-- End Top Selling -->

                        </div>
                    </div><!-- End Left side columns -->

                    <!-- Right side columns -->
                    <div class="col-lg-4">

                        <!-- Recent Activity -->
                        <div class="card">
                            {{-- <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div> --}}
                            <div class="card-body" style="margin-bottom: 20px;">
                                <h5 class="card-title">Top 5 Penjualan</h5>
                                <div class="activity">
                                    @foreach ($data['menuSales'] as $menu)
                                        <div class="activity-item d-flex">
                                            <div class="activity-photo">
                                                <img src="{{ asset('storage/' . $menu->menu->image) }}"
                                                    alt="{{ $menu->menu->name }}" class="img-thumbnail" width="50">
                                            </div>
                                            <div class="activity-content ms-3">
                                                <!-- Nama menu di atas -->
                                                <div class="fw-bold">{{ $menu->menu->nama_menu }}</div>
                                                <!-- Terjual di bawah -->
                                                <div class="text-muted">Terjual: {{ $menu->total_sales }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>


                            <!-- End Recent Activity -->

                            <!-- Budget Report -->
                            {{-- <div class="card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">Budget Report <span>| This Month</span></h5>

                                <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                                            legend: {
                                                data: ['Allocated Budget', 'Actual Spending']
                                            },
                                            radar: {
                                                // shape: 'circle',
                                                indicator: [{
                                                        name: 'Sales',
                                                        max: 6500
                                                    },
                                                    {
                                                        name: 'Administration',
                                                        max: 16000
                                                    },
                                                    {
                                                        name: 'Information Technology',
                                                        max: 30000
                                                    },
                                                    {
                                                        name: 'Customer Support',
                                                        max: 38000
                                                    },
                                                    {
                                                        name: 'Development',
                                                        max: 52000
                                                    },
                                                    {
                                                        name: 'Marketing',
                                                        max: 25000
                                                    }
                                                ]
                                            },
                                            series: [{
                                                name: 'Budget vs spending',
                                                type: 'radar',
                                                data: [{
                                                        value: [4200, 3000, 20000, 35000, 50000, 18000],
                                                        name: 'Allocated Budget'
                                                    },
                                                    {
                                                        value: [5000, 14000, 28000, 26000, 42000, 21000],
                                                        name: 'Actual Spending'
                                                    }
                                                ]
                                            }]
                                        });
                                    });
                                </script>

                            </div>
                        </div><!-- End Budget Report --> --}}

                            <!-- Website Traffic -->
                            {{-- <div class="card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body pb-0">
                                    <h5 class="card-title">Website Traffic <span>| Today</span></h5>

                                    <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            echarts.init(document.querySelector("#trafficChart")).setOption({
                                                tooltip: {
                                                    trigger: 'item'
                                                },
                                                legend: {
                                                    top: '5%',
                                                    left: 'center'
                                                },
                                                series: [{
                                                    name: 'Access From',
                                                    type: 'pie',
                                                    radius: ['40%', '70%'],
                                                    avoidLabelOverlap: false,
                                                    label: {
                                                        show: false,
                                                        position: 'center'
                                                    },
                                                    emphasis: {
                                                        label: {
                                                            show: true,
                                                            fontSize: '18',
                                                            fontWeight: 'bold'
                                                        }
                                                    },
                                                    labelLine: {
                                                        show: false
                                                    },
                                                    data: [{
                                                            value: 1048,
                                                            name: 'Search Engine'
                                                        },
                                                        {
                                                            value: 735,
                                                            name: 'Direct'
                                                        },
                                                        {
                                                            value: 580,
                                                            name: 'Email'
                                                        },
                                                        {
                                                            value: 484,
                                                            name: 'Union Ads'
                                                        },
                                                        {
                                                            value: 300,
                                                            name: 'Video Ads'
                                                        }
                                                    ]
                                                }]
                                            });
                                        });
                                    </script>

                                </div>
                            </div><!-- End Website Traffic --> --}}

                            <!-- News & Updates Traffic -->
                            {{-- <div class="card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>

                                <div class="news">
                                    <div class="post-item clearfix">
                                        <img src="assets/img/news-1.jpg" alt="">
                                        <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>
                                        <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
                                    </div>

                                    <div class="post-item clearfix">
                                        <img src="assets/img/news-2.jpg" alt="">
                                        <h4><a href="#">Quidem autem et impedit</a></h4>
                                        <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona nande...
                                        </p>
                                    </div>

                                    <div class="post-item clearfix">
                                        <img src="assets/img/news-3.jpg" alt="">
                                        <h4><a href="#">Id quia et et ut maxime similique occaecati ut</a></h4>
                                        <p>Fugiat voluptas vero eaque accusantium eos. Consequuntur sed ipsam et totam...
                                        </p>
                                    </div>

                                    <div class="post-item clearfix">
                                        <img src="assets/img/news-4.jpg" alt="">
                                        <h4><a href="#">Laborum corporis quo dara net para</a></h4>
                                        <p>Qui enim quia optio. Eligendi aut asperiores enim repellendusvel rerum cuder...
                                        </p>
                                    </div>

                                    <div class="post-item clearfix">
                                        <img src="assets/img/news-5.jpg" alt="">
                                        <h4><a href="#">Et dolores corrupti quae illo quod dolor</a></h4>
                                        <p>Odit ut eveniet modi reiciendis. Atque cupiditate libero beatae dignissimos
                                            eius...</p>
                                    </div>

                                </div><!-- End sidebar recent posts-->

                            </div>
                        </div><!-- End News & Updates --> --}}

                        </div><!-- End Right side columns -->
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Menu dengan Stok Terendah</h5>
                                @foreach ($data['menuTerendah'] as $menu)
                                    <div class="activity-item d-flex">
                                        <div class="activity-photo">
                                            <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->nama_menu }}"
                                                class="img-thumbnail" width="50">
                                        </div>
                                        <div class="activity-content ms-3">
                                            <div class="fw-bold">{{ $menu->nama_menu }}</div>
                                            <div class="text-muted">Stok: {{ $menu->jumlah }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
            </section>

        </main><!-- End #main -->

        <!-- ======= Footer ======= -->


        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/chart.js/chart.umd.js"></script>
        <script src="assets/vendor/echarts/echarts.min.js"></script>
        <script src="assets/vendor/quill/quill.min.js"></script>
        <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="assets/vendor/tinymce/tinymce.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>

    </body>

    </html>
@endsection
