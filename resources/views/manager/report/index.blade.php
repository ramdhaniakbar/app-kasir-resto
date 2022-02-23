@extends('master');

@section('title', 'Manager')

@section('content')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
   {{ session ('success') }}
</div>
@endif
@if (session('danger'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
   {{ session ('danger') }}
</div>
@endif
<div class="card">
   <div class="card-body">
      <h4 class="card-title">All Report</h4>
      <a href=""><button type="button" class="btn btn-danger btn-icon-text"> Print PDF <i
            class="mdi mdi-printer btn-icon-append"></i>
      </button></a>
      <div class="table-responsive mt-4">
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Customer Name</th>
                  <th>Menu Name</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Employee Name</th>
                  <th>Transaction At</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($reports as $report)
               <tr>
                  <td>{{ $reports->firstItem() + $loop->index }}</td>
                  <td>{{ $report->customer_name }}</td>
                  <td>{{ $report->menu_name }}</td>
                  <td>{{ $report->qty }}</td>
                  <td>{{ 'Rp ' . number_format($report->total) }}</td>
                  <td>{{ $report->employee_name }}</td>
                  <td>{{ $report->created_at->diffForHumans() }}</td>
               </tr>
               @endforeach
            </tbody>
         </table>
         {{ $reports->links() }}
      </div>
   </div>
</div>
@endsection