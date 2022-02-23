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
      <a href="" class=""><button type="button" class="btn btn-danger btn-icon-text float-right"> Print PDF <i
         class="mdi mdi-printer btn-icon-append"></i>
      </button></a>

      <form class="form-inline">
         <label class="form-label">Filter Data: </label>
         <div class="col-md-8">
            <label class="sr-only" for="inputDate1">Date 1</label>
            <input type="date" name="date_1" class="form-control mb-2 mr-sm-2" id="inputDate1"/>
            <label class="sr-only" for="inputDate2">Username</label>
            <input type="date" name="date_2" class="form-control mb-2 mr-sm-2" id="inputDate2"/>
            <button type="submit" class="btn btn-primary"><i class="mdi mdi-filter-outline"></i>Filter</button>
         </div>
      </form>

      <div class="table-responsive mt-4">
         <table class="table table-bordered mb-4">
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