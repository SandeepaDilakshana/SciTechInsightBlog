@extends('admin_panel.layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="content-wraper-area">
        <div class="dashboard-area">
            <div class="container-fluid">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="dashboard-header-title">
                                <h5 class="mb-0">Welcome back, <span
                                        style="background: linear-gradient(45deg, #4e73df, #224abe); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: bold;">{{ Auth::user()->name }}</span>
                                </h5>
                                <p class="mb-0"> Here's what's happening today.
                                    today.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-6 col-xxl-3">
                        <div class="card ">
                            <div class="card-body" data-intro="Total Posts">
                                <div class="single-widget d-flex align-items-center justify-content-between">
                                    <div>
                                        <div class="widget-icon">
                                            <i class='bx bx-mouse-alt'></i>
                                        </div>
                                        <div class="widget-desc">
                                            <h5>Total Posts</h5>
                                        </div>
                                    </div>
                                    <div class="progress-report" data-title="progress" data-intro="Number of total posts">
                                        <p>{{ $posts_count ?? '0' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-6 col-xxl-3">
                        <div class="card">
                            <div class="card-body" data-intro="Categories">
                                <div class="single-widget d-flex align-items-center justify-content-between">
                                    <div>
                                        <div class="widget-icon">
                                            <i class='bx bx-user-voice'></i>
                                        </div>
                                        <div class="widget-desc">
                                            <h5>Categories</h5>
                                        </div>
                                    </div>
                                    <div class="progress-report" data-title="progress"
                                        data-intro="Number of total categories">
                                        <p>{{ $categories_count ?? '0' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-6 col-xxl-3">
                        <div class="card">
                            <div class="card-body" data-intro="Tags">
                                <div class="single-widget d-flex align-items-center justify-content-between">
                                    <div>
                                        <div class="widget-icon">
                                            <i class='bx bx-wallet'></i>
                                        </div>
                                        <div class="widget-desc">
                                            <h5>Tags</h5>
                                        </div>
                                    </div>
                                    <div class="progress-report" data-title="progress" data-intro="Number of total tags">
                                        <p>{{ $tags_count ?? '0' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-6 col-xxl-3">
                        <div class="card">
                            <div class="card-body" data-intro="Users">
                                <div class="single-widget d-flex align-items-center justify-content-between">
                                    <div>
                                        <div class="widget-icon">
                                            <i class='bx bx-bar-chart-alt-2'></i>
                                        </div>
                                        <div class="widget-desc">
                                            <h5>Users</h5>
                                        </div>
                                    </div>
                                    <div class="progress-report" data-title="progress" data-intro="Number of users">
                                        <p>{{ $users_count ?? '0' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4">
                        <div class="overflow-hidden card w-100 position-relative">
                            <div class="pb-4 card-body">
                                <div class="card-title">
                                    <h4>Post Creation Activity</h4>
                                    <h6 class="text-primary">Monthly Overview</h6>
                                </div>

                                <div style="height: 250px;">
                                    <canvas id="postStatsChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div
                                    class="card-title border-bootom-none mb-30 d-flex align-items-center justify-content-between">
                                    <h6 class="mb-0">Recent Posts</h6>
                                </div>
                                <div class="table-responsive text-nowrap">
                                    <table class="table mb-0 table-centered table-nowrap table-hover">
                                        <thead>
                                            <tr>
                                                <th>Post</th>
                                                <th>Stutas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($posts->take(5) as $post)
                                                <tr>
                                                    <td class="d-flex align-items-center"><img class="shop-img"
                                                            src="{{ asset($post->featured) }}" alt="">
                                                        <span>
                                                            {{ $post->title }}</span>
                                                    </td>
                                                    <td class="text-success">Published</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="2" class="text-center text-muted">
                                                        <i class="ti-info-alt me-2"></i> No recent posts found.
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('postStatsChart').getContext('2d');
            const chartLabels = {!! json_encode($chartLabels) !!};
            const chartData = {!! json_encode($chartData) !!};

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: chartLabels,
                    datasets: [{
                        label: 'New Posts',
                        data: chartData,
                        borderColor: '#1d4ed8',
                        backgroundColor: 'rgba(29, 78, 216, 0.1)',
                        fill: true,
                        borderWidth: 2,
                        tension: 0.3,
                        pointRadius: 3
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                display: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection
