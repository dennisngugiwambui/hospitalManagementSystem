@extends('admin.app')

@section('content')

<style>
    /* CSS for the graph */
    #wardChart {
      height: 300px; /* set the initial height for desktop view */
    }

    /* Media queries for mobile view */
    @media only screen and (max-width: 767px) {
      #wardChart {
        height: calc(100vw - 200px); /* use calc() function to dynamically calculate the height based on viewport width */
      }
    }

    /* Optional CSS to make the chart responsive even on larger screens */
    @media only screen and (min-width: 768px) {
      #wardChart {
        height: calc(100vh - 400px); /* use calc() function to dynamically calculate the height based on viewport height */
      }
    }
    </style>
    <div class="container">
        <h1 class="text-center">Admitted People</h1>

        <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <canvas id="wardChart"></canvas>
            </div>
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <form method="GET" action="">
                    <div class="input-group">
                        <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Search by Ticket ID">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Contact Form Entries</h3>
            </div>
            <div class="card-body">
              <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Ticket ID</th>
                        <th>Name</th>
                        <th>Ward</th>
                        <th>Next of Kiln</th>
                        <th>Admission Date</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($admitted->count() > 0)
                    @foreach ($admitted as $admitted)
                        <tr>
                            <td>{{ $admitted->ticket_id }}</td>
                            <td>{{ $admitted->patient_name }}</td>
                            <td>{{ $admitted->ward }}</td>
                            <td>{{ $admitted->next_of_kiln }}</td>
                            <td>{{ $admitted->from }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">No Admitted People Found</td>
                    </tr>
                @endif
                </tbody>
              </table>
            </div>
          </div>

        <!-- Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            var ctx = document.getElementById('wardChart').getContext('2d');
            var wardData = {!! $wardData !!};

            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: Object.keys(wardData),
                    datasets: [{
                        label: 'Patient Count',
                        data: Object.values(wardData),
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                stepSize: 1
                            }
                        }]
                    }
                }
            });
        </script>

<script>
    function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    </script>

@endsection
