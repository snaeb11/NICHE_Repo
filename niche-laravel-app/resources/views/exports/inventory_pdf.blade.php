<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Inventories</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 6px; border: 1px solid #ccc; }
    </style>
</head>
<body>
    <h1>Inventory Records</h1>
    <table>
        <thead>
            <tr>
                <th>Submission ID</th>
                <th>Title</th>
                <th>Authors</th>
                <th>Adviser</th>
                <th>Program</th>
                <th>Academic Year</th>
                <th>Inventory #</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventories as $item)
                <tr>
                    <td>{{ $item->submission_id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->authors }}</td>
                    <td>{{ $item->adviser }}</td>
                    <td>{{ $item->program->name ?? '' }}</td>
                    <td>{{ $item->academic_year }}</td>
                    <td>{{ $item->inventory_number }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>