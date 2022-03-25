<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>PDF Report</title>
</head>
<body>
   <h1>Ini export pdf</h1>
   <table border="1" cellspacing="0" cellpadding="2">
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
         @foreach ($transactions as $transaction)
         <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $transaction->customer_name }}</td>
            <td>{{ $transaction->menu_name }}</td>
            <td>{{ $transaction->qty }}</td>
            <td>{{ $transaction->total }}</td>
            <td>{{ $employee }}</td>
            <td>{{ $transaction->created_at }}</td>
         </tr>
         @endforeach
      </tbody>
   </table>
</body>
</html>