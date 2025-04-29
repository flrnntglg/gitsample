<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Submissions for {{ $region }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h2 class="mb-4">Submissions for {{ $region }}</h2>

    @if($data)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Submission ID</th>
                    <th>Status</th>
                    <th>Submission Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $submission)
                    <tr>
                        <td>{{ $submission['submission_id'] }}</td>
                        <td>{{ $submission['status'] }}</td>
                        <td>{{ \Carbon\Carbon::parse($submission['created']) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">No submissions found for this region.</div>
    @endif
</div>
</body>
</html>
