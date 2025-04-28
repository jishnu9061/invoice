@extends('layouts.app')

@section('content')
<div class="container mx-auto p-8">
    <header>
        <h1>{{ $slot }}</h1>
    </header>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table id="invoiceTable" class="min-w-full table-auto">
            <thead class="bg-gray-200">
                <tr>
                    <th>#</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Total Amount</th>
                    <th>Tax %</th>
                    <th>Net Amount</th>
                    <th>Invoice Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoices as $invoice)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $invoice->customer_name }}</td>
                        <td>{{ $invoice->customer_email }}</td>
                        <td>{{ number_format($invoice->total_amount, 2) }}</td>
                        <td>{{ $invoice->tax_percentage }}%</td>
                        <td>{{ number_format($invoice->net_amount, 2) }}</td>
                        <td>{{ $invoice->invoice_date }}</td>
                        <td class="text-center">
                            <a href="{{ route('invoices.edit', $invoice->id) }}"
                                class="text-blue-600 hover:text-blue-800 mr-2">Edit</a>

                            <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        <a href="{{ route('invoices.create') }}" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700">
            + Create New Invoice
        </a>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#invoiceTable').DataTable({
        "pageLength": 10,
        "order": [[ 0, "asc" ]],
        "columnDefs": [
            { "orderable": false, "targets": 7 }
        ]
    });
});
</script>
@endpush
