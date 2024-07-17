@extends('user.layout.user')

@section('user')
<div class="px-3">

    <!-- Start Content-->
    <div class="container-fluid">
        <style>
            .morris-hover-row-label {
            color: #fff;
        }
        </style>
        <!-- start page title -->
        <div class="py-3 py-lg-4">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="page-title mb-0">Dashboard</h4>
                </div>
                <div class="col-lg-6">
                    <div class="d-none d-lg-block">
                        <ol class="breadcrumb m-0 float-end">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashtrap</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-primary float-end">Per Year</span>
                            <h5 class="card-title mb-0">Total Invoices</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    {{ $invoice->count() }}
                                </h2>
                            </div>
                            {{-- <div class="col-4 text-end">
                                <span class="text-muted">12.5% <i
                                        class="mdi mdi-arrow-up text-success"></i></span>
                            </div> --}}
                        </div>

                        {{-- <div class="progress shadow-sm" style="height: 5px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 57%;">
                            </div>
                        </div> --}}
                    </div>
                    <!--end card body-->
                </div><!-- end card-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-primary float-end">Per Year</span>
                            <h5 class="card-title mb-0">Paid Invoices</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    {{ $paid }}
                                </h2>
                            </div>
                            {{-- <div class="col-4 text-end">
                                <span class="text-muted">18.71% <i
                                        class="mdi mdi-arrow-down text-danger"></i></span>
                            </div> --}}
                        </div>

                        {{-- <div class="progress shadow-sm" style="height: 5px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 57%;">
                            </div>
                        </div> --}}
                    </div>
                    <!--end card body-->
                </div><!-- end card-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-primary float-end">Per Year</span>
                            <h5 class="card-title mb-0">Unpaid Invoices</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    {{ $unpaid }}
                                </h2>
                            </div>
                            <div class="col-4 text-end">
                                {{-- <span class="text-muted">57% <i
                                        class="mdi mdi-arrow-up text-success"></i></span> --}}
                            </div>
                        </div>

                        {{-- <div class="progress shadow-sm" style="height: 5px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 57%;">
                            </div>
                        </div> --}}
                    </div>
                    <!--end card body-->
                </div>
                <!--end card-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-primary float-end">Per Year</span>
                            <h5 class="card-title mb-0">Total Paid Amount</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    ${{ $total_year }}
                                </h2>
                            </div>
                            <div class="col-4 text-end">
                                {{-- <span class="text-muted">17.8% <i
                                        class="mdi mdi-arrow-down text-danger"></i></span> --}}
                            </div>
                        </div>

                        {{-- <div class="progress shadow-sm" style="height: 5px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 57%;"></div>
                        </div> --}}
                    </div>
                    <!--end card body-->
                </div><!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row-->


        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <span class="badge badge-soft-primary float-end">Per Year</span>
                        <h4 class="card-title">Total Amount</h4>
                        <p class="card-subtitle mb-4"></p>
                        <div id="morris-bar-example" class="morris-chart"></div>
                    </div> <!--end card body-->
                </div> <!-- end card-->
            </div> <!-- end col -->

            {{-- <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Stock</h4>
                        <p class="card-subtitle mb-4">Recent Stock</p>

                        <div class="text-center">
                            <input data-plugin="knob" data-width="165" data-height="165" data-linecap=round
                                data-fgColor="#7a08c2" value="95" data-skin="tron" data-angleOffset="180"
                                data-readOnly=true data-thickness=".15" />
                            <h5 class="text-muted mt-3">Total sales made today</h5>


                            <p class="text-muted w-75 mx-auto sp-line-2">Traditional heading
                                elements are
                                designed to work best in the meat of your page content.</p>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <p class="text-muted font-15 mb-1 text-truncate">Target</p>
                                    <h4><i class="fas fa-arrow-up text-success me-1"></i>$7.8k</h4>

                                </div>
                                <div class="col-6">
                                    <p class="text-muted font-15 mb-1 text-truncate">Last week</p>
                                    <h4><i class="fas fa-arrow-down text-danger me-1"></i>$1.4k</h4>
                                </div>

                            </div>
                        </div>
                    </div> <!--end card body-->
                </div> <!-- end card-->
            </div> <!-- end col --> --}}

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Account Transactions</h4>
                                <p class="card-subtitle mb-4">Transaction period of current year</p>
                                <h3>${{ $total_year }} <span class="badge badge-soft-success float-end">+7.5%</span>
                                </h3>
                            </div>
                        </div> <!-- end row -->

                        <div id="sparkline1" class="mt-3"></div>
                    </div>
                    <!--end card body-->
                </div>
                <!--end card-->

            </div><!-- end col -->
        </div>
        <!--end row-->

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end position-relative">
                            {{-- <a href="#" class="dropdown-toggle h4 text-muted" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#" class="dropdown-item">Action</a></li>
                                <li><a href="#" class="dropdown-item">Another action</a></li>
                                <li><a href="#" class="dropdown-item">Something else here</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a href="#" class="dropdown-item">Separated link</a></li>
                            </ul> --}}
                        </div>
                        <h4 class="card-title d-inline-block">Total Revenue</h4>

                        <div id="morris-line-example" class="morris-chart" style="height: 290px;"></div>

                        {{-- <div class="row text-center mt-4">
                            <div class="col-6">
                                <h4>$7841.12</h4>
                                <p class="text-muted mb-0">Total Revenue</p>
                            </div>
                            <div class="col-6">
                                <h4>17</h4>
                                <p class="text-muted mb-0">Open Compaign</p>
                            </div>
                        </div> --}}

                    </div>
                    <!--end card body-->

                </div>
                <!--end card-->
            </div>
               <!--end col-->
               <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Top 5 Customers</h4>
                        {{-- <p class="card-subtitle mb-4 font-size-13">Transaction period from 21 July to 25 Aug
                        </p> --}}

                        <div class="table-responsive">
                            <table class="table table-centered table-striped table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Sells Person</th>
                                        <th>Custumer Name</th>
                                        <th>Custumer Email</th>
                                        <th>Created Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=0;@endphp
                                    @foreach ($top5Customers as $t)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr>
                                            <td>
                                                {{ $i }}
                                            </td>
                                            <td>
                                                {{ $t->user->name }}
                                            </td>
                                            <td class="table-user">

                                                <a href="{{ route('user.customer.view', $t->id) }}"
                                                    class="text-body font-weight-semibold">{{ $t->name }}</a>
                                            </td>

                                            <td>
                                                {{ $t->email }}
                                            </td>

                                            <td>
                                                {{ $t->created_at->format('d-M-y') }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!--end card body-->

                </div>
                <!--end card-->
            </div>
            <!--end col-->

        </div>
        <!--end row-->

    </div> <!-- container -->

</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script>
    $(function() {
        "use strict";
        $("#morris-bar-example").length &&
            Morris.Bar({
                element: "morris-bar-example",
                barColors: ["#ebeef1", "#00c2b2"],
                data: [{
                        y: "Jan",
                        a: {{ $janPaidTotal }},
                        b: {{ $janUnpaidTotal }}
                    },
                    {
                        y: "Feb",
                        a: {{ $febPaidTotal }},
                        b: {{ $febUnpaidTotal }}
                    },
                    {
                        y: "Mar",
                        a: {{ $marPaidTotal }},
                        b: {{ $marUnpaidTotal }}
                    },
                    {
                        y: "Apr",
                        a: {{ $aprPaidTotal }},
                        b: {{ $aprUnpaidTotal }}
                    },
                    {
                        y: "May",
                        a: {{ $mayPaidTotal }},
                        b: {{ $mayUnpaidTotal }}
                    },
                    {
                        y: "Jun",
                        a: {{ $junPaidTotal }},
                        b: {{ $junUnpaidTotal }}
                    },
                    {
                        y: "Jul",
                        a: {{ $julPaidTotal }},
                        b: {{ $julUnpaidTotal }}
                    },
                    {
                        y: "Aug",
                        a: {{ $augPaidTotal }},
                        b: {{ $augUnpaidTotal }}
                    },
                    {
                        y: "Sep",
                        a: {{ $sepPaidTotal }},
                        b: {{ $sepUnpaidTotal }}
                    },
                    {
                        y: "Oct",
                        a: {{ $octPaidTotal }},
                        b: {{ $octUnpaidTotal }}
                    },
                    {
                        y: "Nov",
                        a: {{ $novPaidTotal }},
                        b: {{ $novUnpaidTotal }}
                    },
                    {
                        y: "Dec",
                        a: {{ $decPaidTotal }},
                        b: {{ $decUnpaidTotal }}
                    }
                ],
                xkey: "y",
                ykeys: ["a", "b"],
                hideHover: "auto",
                gridLineColor: "#eef0f2",
                resize: !0,
                barSizeRatio: 0.4,
                labels: ["Paid $", "Unpaid $"],
            }),
            $("#morris-donut-example").length &&
            Morris.Donut({
                element: "morris-donut-example",
                resize: !0,
                colors: ["#7266bb", "#1d84c6", "#f85359"],
                data: [{
                        label: "Samsung Company",
                        value: 12
                    },
                    {
                        label: "Apple Company",
                        value: 30
                    },
                    {
                        label: "Vivo Mobiles",
                        value: 20
                    },
                ],
            }),
            $(document).ready(function() {
                function a() {
                    $("#sparkline1").sparkline(
                        [
                            {{ $janPaidTotal }}, {{ $febPaidTotal }}, {{ $marPaidTotal }},
                            {{ $aprPaidTotal }}, {{ $mayPaidTotal }}, {{ $junPaidTotal }},
                            {{ $julPaidTotal }}, {{ $augPaidTotal }}, {{ $sepPaidTotal }},
                            {{ $octPaidTotal }}, {{ $novPaidTotal }}, {{ $decPaidTotal }}
                        ], {
                            type: "line",
                            width: "100%",
                            height: "297",
                            chartRangeMax: {{ $total_year }},
                            lineColor: "#1991eb",
                            fillColor: "rgba(25,118,210,0.18)",
                            highlightLineColor: "rgba(0,0,0,.1)",
                            highlightSpotColor: "rgba(0,0,0,.2)",
                            maxSpotColor: !1,
                            minSpotColor: !1,
                            spotColor: !1,
                            lineWidth: 1,
                        }
                    );
                }
                var o;
                a(),
                    $(window).resize(function(e) {
                        clearTimeout(o),
                            (o = setTimeout(function() {
                                a();
                            }, 300));
                    });
            }),
            $("#morris-line-example").length &&
            Morris.Line({
                element: "morris-line-example",
                gridLineColor: "#eef0f2",
                lineColors: ["#f15050", "#eef0f2"],
                data: [
                        {
                            y: "{{$lastYear5}}",
                            a: {{$last5_current_paid}},
                            b: {{$last5_current_unpaid}}
                        },
                        {
                            y: "{{$lastYear4}}",
                            a: {{$last4_current_paid}},
                            b: {{$last4_current_unpaid}}
                        },
                        {
                            y: "{{$lastYear3}}",
                            a: {{$last3_current_paid}},
                            b: {{$last3_current_unpaid}}
                        },
                        {
                            y: "{{$lastYear2}}",
                            a: {{$last2_current_paid}},
                            b: {{$last2_current_unpaid}}
                        },
                        {
                            y: "{{$lastYear}}",
                            a: {{$last_current_paid}},
                            b: {{$last_current_unpaid}}
                        },
                        {
                            y: "{{$currentYear}}",
                            a: {{$year_current_paid}},
                            b: {{$year_current_unpaid}}
                        },
                    ],
                    xkey: "y",
                    ykeys: ["a", "b"],
                    hideHover: "auto",
                    resize: !0,
                    labels: ["Paid", "Unpaid"],
            });
    });
</script>
@endsection
