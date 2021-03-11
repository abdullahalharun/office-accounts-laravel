<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="180x180" href="https://i.morioh.com/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://i.morioh.com/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://i.morioh.com/favicon/favicon-16x16.png">
    <link rel="manifest" href="https://i.morioh.com/favicon/site.webmanifest">
    <link rel="mask-icon" href="https://i.morioh.com/favicon/safari-pinned-tab.svg" color="#262521">
    <link rel="shortcut icon" href="images/Fav-Icon.png" type="image/x-icon">
    <meta name="msapplication-TileColor" content="#faa700">
    <meta name="msapplication-config" content="https://i.morioh.com/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">


    <meta name="twitter:title" content="Morioh Responsive Template with Bootstrap 4, HTML5 and Vue.js">
    <meta name="twitter:description" content="Morioh Theme is Bootstrap responsive template free download">
    <meta name="twitter:image" content="https://i.imgur.com/gWYKl5F.png">
    <meta property="twitter:card" content="summary_large_image">


    <meta property="og:title" content="Morioh Responsive Template with Bootstrap 4, HTML5 and Vue.js">
    <meta property="og:image" content="https://i.imgur.com/gWYKl5F.png">
    <meta property="og:description" content="Morioh Theme is Bootstrap responsive template free download">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="720">

    <title>Taibah Accounts</title>
    <meta itemprop="description" content="Morioh Theme is Bootstrap responsive template free download">
    <meta itemprop="image" content="https://i.imgur.com/gWYKl5F.png">

    <meta name="description" content="Morioh Theme is Bootstrap responsive template free download">
    <meta name="image" content="https://i.imgur.com/gWYKl5F.png">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.4.0/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@4.7.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.7.2/animate.min.css">

    <link rel="stylesheet" href="/css/morioh.css">


</head>

<body class="menubar-enabled navbar-top-fixed">

    <div class="wrapper">

        <div class="main-navbar navbar-expand-md navbar-light bg-white fixed-top shadow-sm">

            <button class="btn d-md-none" type="button" data-toggle="collapse" data-target="#main-menu"
                aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>


            <img src="https://i.imgur.com/QTZ8pU1.png" title="Taibah" class="navbar-logo d-md-none"
                style="height: 36px;">


            <button class="btn d-md-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto hidden-sm-down">

                    <li class="nav-item mr-5">
                        <a href="javascript://" class="nav-icon font-2xl" id="navbar-toggler">
                            <!-- <i class="fas fa-bars"></i> -->
                            <!-- <i class="mdi mdi-view-sequential font-2xl"></i> -->

                            <i class="mdi mdi-menu"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <form class="form-inline">
                            <div class="input-group">
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                
                                    <button class="btn btn-outline-primary" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>                              
                            </div>
                        </form>
                    </li>

                </ul>


                <ul class="navbar-nav my-2 my-lg-0">

                    <li class="nav-item mr-10">
                        <a href="#" class="nav-icon font-2xl">
                            <!-- <i class="fas fa-chart-pie"></i> -->
                            <i class="mdi mdi-view-dashboard-outline"></i>
                        </a>
                    </li>

                    <li class="nav-item mr-10">
                        <a href="#" class="nav-icon font-2xl rounded-circle">
                            <!-- <i class="fas fa-cog"></i> -->
                            <i class="mdi mdi-settings-outline"></i>
                        </a>
                    </li>

                    <li class="nav-item mr-10 dropdown">
                        <a href="#" class="nav-icon avatar rounded-circle" id="PJXN7R" role="button"
                            data-toggle="dropdown" aria-expanded="false">
                            <img src="https://i.imgur.com/ROPF2fQ.png">
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="PJXN7R">
                            <a class="dropdown-item" href="#">
                                <i class="mdi mdi-account-circle-outline"></i> My Account</a>
                            <a class="dropdown-item" href="#"><i class="mdi mdi-lock-outline"></i> Change password</a>
                            <a class="dropdown-item" href="#"><i class="mdi mdi-settings-outline"></i>Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="mdi mdi-exit-to-app"></i> Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    {{ csrf_field() }}
                                </form>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-icon font-2xl rounded-circle" href="#" id="WJIK6R" role="button"
                            data-toggle="dropdown" aria-expanded="false">
                            <!-- <i class="fas fa-ellipsis-h"></i> -->

                            <i class="mdi mdi-dots-horizontal"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="WJIK6R">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>

            </div>
        </div>

        <div class="menubar menubar-dark" id="main-menu">

            <div class="menubar-header text-center bg-primary">
                <a class="menubar-brand" href="/expense">
                    <img src="/images/logo_icon.png" title="Dashboard" class="menubar-logo"
                        style="height: 50px;">
                </a>
            </div>

            <div class="menubar-body">
                <ul class="menu accordion">

                    <!-- <li class="menu-item">
                        <a href="started.html" class="menu-link">
                            <i class="menu-icon fas fa-info"></i>
                            <i class="menu-icon fas fa-seedling"></i>
                            <i class="menu-icon mdi mdi-code-braces-box"></i>
                            <span class="menu-label">Getting Started</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="typography.html" class="menu-link">
                            <i class="menu-icon fas fa-fill-drip"></i>

                            <i class="menu-icon mdi mdi-format-size"></i>
                            <i class="fas fa-heading"></i>
                            <span class="menu-label">Typography</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="colors.html" class="menu-link">
                            <i class="menu-icon mdi mdi-invert-colors"></i>
                            
                            <span class="menu-label">Colors</span>
                        </a>
                    </li> -->
                    <li class="menu-item">
                        <a href="/dashboard" class="menu-link">
                            <!-- <i class="menu-icon fas fa-magic"></i> -->
                            <i class="menu-icon mdi mdi-view-dashboard"></i>
                            <span class="menu-label">Dashboard</span>
                            <span class="menu-badge">
                                <!-- <span class="badge bg-info">1</span> -->
                            </span>

                        </a>
                    </li>
                                     
                    <li class="menu-item">
                        <a href="javascript://" class="menu-link" data-toggle="collapse" data-target="#menu-expense"
                            aria-expanded="true" aria-controls="menu-expense">
                            <i class="menu-icon fas fa-border-all"></i>
                            <span class="menu-label">Expense</span>
                            <i class="menu-arrow mdi mdi-chevron-right"></i>
                        </a>

                        <ul class="menu collapse" data-parent="#main-menu" id="menu-expense">
                            <li class="menu-item">
                                <a href="/expense" class="menu-link">
                                    <i class="menu-icon"></i>
                                    <span class="menu-label"> View All</span>
                                </a>
                            </li>

                            <li class="menu-item">
                                <a href="/expense/create" class="menu-link">
                                    <i class="menu-icon"></i>
                                    <span class="menu-label"> Add New</span>
                                </a>
                            </li>
                            
                            <li class="menu-item">
                                <a href="/expense-category/create" class="menu-link">
                                    <i class="menu-icon"></i>
                                    <span class="menu-label"> Add New Category</span>
                                </a>
                            </li>

                        </ul>

                    </li>

                    <li class="menu-item">
                        <a href="javascript://" class="menu-link" data-toggle="collapse" data-target="#menu-account"
                            aria-expanded="true" aria-controls="menu-account">
                            <i class="menu-icon fas fa-border-all"></i>
                            <span class="menu-label">Account</span>
                            <i class="menu-arrow mdi mdi-chevron-right"></i>
                        </a>

                        <ul class="menu collapse" data-parent="#main-menu" id="menu-account">
                            <li class="menu-item">
                                <a href="/account" class="menu-link">
                                    <i class="menu-icon"></i>
                                    <span class="menu-label"> View All</span>
                                </a>
                            </li>

                            <li class="menu-item">
                                <a href="/account/create" class="menu-link">
                                    <i class="menu-icon"></i>
                                    <span class="menu-label"> Add New</span>
                                </a>
                            </li>
                            
                        </ul>

                    </li>

                </ul>
            </div>

            <div class="menubar-footer bg-dark p-10">
                <a href="https://morioh.com" class="d-block text-truncate">&copy Morioh <span id="version"></span></a>
            </div>

        </div>
        

        <div class="container-fluid mt-15">

        @include('inc.messages')

          <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="/{{ request()->path() }}">{{ request()->path() }}</a></li>
              
          </ol>
          </nav>

            @yield('content')
            
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.4.0/dist/perfect-scrollbar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/highcharts@8.0.0/highcharts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-knob@1.2.11/dist/jquery.knob.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-sparkline@2.4.0/jquery.sparkline.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/peity@3.3.0/jquery.peity.min.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-50750921-19"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-50750921-19');
    </script>



    <script src="/js/morioh.js"></script>

    <script>

        $(function () {

            $('#modal-download').modal('show');




            $(".bar").peity("bar");


            // knob

            $(".knob").knob();


            // sparkline bar
            $('.sparkline-bar').sparkline('html', {
                type: 'bar',
                barWidth: 10,
                height: 65,
                barColor: '#3b73da',
                chartRangeMax: 12
            });

            $('.sparkline-line').sparkline('html', {
                width: 120,
                height: 65,
                lineColor: '#3b73da',
                fillColor: false
            });

            /************** AREA CHARTS ********************/


            $('.sparkline-area').sparkline('html', {
                width: 120,
                height: 65,
                lineColor: '#3b73da',
                fillColor: 'rgba(59, 115, 218,0.2)'
            });


            $('.sparkline').sparkline('html', {
                width: '100%',
                height: 80,
                lineColor: '#3b73da',
                fillColor: 'rgba(59, 115, 218,0.2)'
            });



            Highcharts.chart('hl-pie-ref', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: ''
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: false
                    }
                },
                series: [{
                    name: 'Referrals',
                    colorByPoint: true,
                    data: [{
                        name: 'Google',
                        y: 30.5,
                        sliced: true,
                        // selected: true
                    }, {
                        name: 'Twiter',
                        y: 25.5
                    }, {
                        name: 'Morioh',
                        y: 16
                    }, {
                        name: 'Facebook',
                        y: 8
                    }, {
                        name: 'Pinterest',
                        y: 4
                    }, {
                        name: 'Other',
                        y: 7.05
                    }]
                }]
            });



            Highcharts.chart('hl-line-main', {

                title: {
                    text: ''//'Stats of last 30 days'
                },

                // subtitle: {
                //     text: 'Source: thesolarfoundation.com'
                // },

                yAxis: {
                    title: {
                        text: 'Traffics of Month'
                    }
                },
                // legend: {
                //     // layout: 'vertical',
                //     // align: 'right',
                //     verticalAlign: 'middle'
                // },

                plotOptions: {
                    series: {
                        label: {
                            connectorAllowed: false
                        },
                        pointStart: 1
                    }
                },

                series: [
                    {
                        name: 'Views',
                        data: [8050, 8500, 8600, 8800, 8600, 9000, 9100, 9100, 9500, 9400, 9800, 9900, 10000, 9800, 9600, 9000, 8800, 9600, 9800, 10000, 11000, 11200, 11400, 11400]
                    },
                    {
                        name: 'Orders',
                        data: [1000, 1100, 1210, 1110, 1150, 1200, 1400, 1500, 1350, 1300, 1200, 1250, 1260, 1390, 1289, 1120, 1200, 1300, 1310, 1350, 1350, 1400, 1300, 1400]
                    }, {
                        name: 'Members',
                        data: [3000, 3200, 4000, 3000, 3500, 6000, 5000, 3450, 5460, 7000, 6000, 6500, 5500, 8000, 7000, 9000, 8000, 7000, 8000, 9000, 9100, 9200, 9300, 9400]
                    }, {
                        name: 'Income',
                        data: [1000, 2200, 2300, 3000, 2500, 2300, 3000, 3200, 2600, 2800, 2700, 2650, 2600, 2800, 2500, 2500, 3000, 3100, 3300, 3000, 3200, 3000, 3200, 3300]
                    }],

                responsive: {
                    rules: [{
                        // condition: {
                        //     maxWidth: 500
                        // },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }

            });
        })

    </script>


</body>

</html>