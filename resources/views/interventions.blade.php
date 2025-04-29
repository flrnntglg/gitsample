<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Intervention Form - {{ $region }}</title>

    <!-- Optional: Bootstrap for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h2 class="mb-4">Intervention Form - {{ $region }}</h2>

    <!-- Region Switcher -->
    <div class="mb-4">
        <form id="regionForm">
            <div class="input-group mb-3">
                <label class="input-group-text" for="regionSelect">Select Region</label>
                <select class="form-select" id="regionSelect">
                    <option selected disabled>Choose...</option>
                    @foreach($iframeUrls as $region => $url)
                        <option value="{{ route('interventions.show', $region) }}">{{ $region }}</option>
                    @endforeach
                </select>
                <button type="button" id="viewSubmissions" class="btn btn-success">View Submissions</button>
                <button type="button" id="viewSummary" class="btn btn-primary">View Summary</button>
            </div>
        </form>
    </div>

    @if($iframeSrc)
        <iframe 
            src="{{ $iframeSrc }}" 
            width="100%" 
            height="700px" 
            frameborder="0" 
            style="border: 1px solid #ccc; border-radius: 8px;">
        </iframe>
    @else
        <div class="alert alert-warning">No form available for this region.</div>
    @endif
</div>

<!-- JavaScript to handle actions -->
<script>
    document.getElementById('regionSelect').addEventListener('change', function() {
        const selectedUrl = this.value;
        if (selectedUrl) {
            window.location.href = selectedUrl;
        }
    });

    document.getElementById('viewSubmissions').addEventListener('click', function() {
        window.location.href = "{{ route('interventions.submissions', $region) }}";
    });

    document.getElementById('viewSummary').addEventListener('click', function() {
        window.location.href = "{{ route('interventions.summary', $region) }}";
    });
</script>

</body>
</html>
