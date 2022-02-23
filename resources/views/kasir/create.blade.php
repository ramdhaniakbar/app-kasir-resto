@extends('master');

@section('title', 'Create Transaction')

@section('content')
<div class="page-header">
   <h3 class="page-title">Create transaction page</h3>
</div>
<div class="col-12">
   @if (session('danger'))
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session ('danger') }}
   </div>
   @endif
</div>
<div class="col-12 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
         <h4 class="card-title">Create transaction</h4>
         <form class="forms-sample" action="{{ route('kasir.store') }}" method="POST">
            @csrf
            <div class="form-group">
               <label for="inputCustomerName">Customer Name</label>
               <input type="text" class="form-control @error('customer_name') is-invalid @enderror" id="inputCustomerName" name="customer_name" placeholder="Customer Name">
               @error('customer_name')
               <span class="text-red">{{ $message }}</span>
               @enderror
            </div>
            <div class="form-group">
               <label for="selectMenu">Menu</label>
               <select name="menu_name" class="form-control" id="selectMenu">
               @foreach ($menus as $menu)
                  <option value="{{ $menu }}">{{ $menu }}</option>
               @endforeach
               </select>
            </div>
            <div class="form-group">
               <label for="inputQty">Quantity</label>
               <input type="number" class="form-control @error('qty') is-invalid @enderror" id="inputQty"
                  name="qty" placeholder="Quantity">
               @error('qty')
               <span class="text-red">{{ $message }}</span>
               @enderror
            </div>
            <button type="submit" class="btn btn-primary mr-2 mt-3">Submit</button>
         </form>
      </div>
   </div>
</div>
@endsection