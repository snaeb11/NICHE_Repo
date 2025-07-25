<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Inventory PDF</title>
    <style>
        @page {
            margin: 25mm 20mm 20mm 20mm;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
        }

        th, td {
            border: 1px solid #888;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }

        .footer {
            position: fixed;
            bottom: -10px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 10px;
            color: #888;
        }
    </style>
</head>
<body>
    <h2>Inventory Report</h2>
    <p><strong>Generated:</strong> {{ \Carbon\Carbon::now()->format('F j, Y g:i A') }}</p>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Item Name</th>
                <th>SKU</th>
                <th>Program</th>
                <th>Stock</th>
                <th>Unit Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventories as $i => $item)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->sku }}</td>
                <td>{{ $item->program->name ?? 'N/A' }}</td>
                <td>{{ $item->stock }}</td>
                <td>₱{{ number_format($item->price, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        © {{ now()->year }} PCByte Inventory System
    </div>
</body>
</html>
