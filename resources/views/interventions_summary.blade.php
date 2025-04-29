<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Summary for {{ $region }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h2 class="mb-4">Summary for {{ $region }}</h2>

    <div class="mb-4">
        <h3>Total Submissions: {{ $summary['total_submissions'] }}</h3>
    </div>

    <h4>Submission Data Overview:</h4>
    <ul>
        @foreach ($data as $submission)
            <li>Submission ID: {{ $submission['submission_id'] }} - Status: {{ $submission['status'] }}</li>
        @endforeach
    </ul>
</div>
</body>
</html>
