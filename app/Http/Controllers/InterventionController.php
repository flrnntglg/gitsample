<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InterventionController extends Controller
{
    private $forms = [
        'Region 1'  => 'aZ4rVxpybyBxc7bL2HqBnJ',
        'Region 2'  => 'a7X8AdtmSeki2Zub4n2TCY',
        'Region 3'  => 'aK69pxDzUU8yqmJDdNumha',
        'Region 4A' => 'abXp6UFVPebZ7yM2EiAC62',
        'Region 4B' => 'aYnKbfmvE5sMFggHS3XjFU',
        'Region 5'  => 'aiFjkgTo6WEcbc4JHYd4eY/',
        'Region 6'  => 'a9kD9tcVDmqJxxmkMzm2JV',
        'Region 7'  => 'aBvYfvCf5SRSk2rSc3P4pj',
        'Region 8'  => 'ajtAQdm6WYErnsQTpDbEEF',
        'Region 9'  => 'a3QXXaqTTKRE86SBAQ6eus',
        'Region 10' => 'atYsc72MRearUey73WjUZa',
        'Region 11' => 'aJy8nbFpbZhiq2NBXauhGh',
        'Region 12' => 'aSExfP2WBarChJn7nfuvhw',
        'Region 13' => 'akyWJFprN5XeS8Suy3QeQ',
    ];

    private $iframeUrls = [
        'Region 1'  => 'https://ee.kobotoolbox.org/i/sCkhq6GQ',
        'Region 2'  => 'https://ee.kobotoolbox.org/i/ouhKh48J',
        'Region 3'  => 'https://ee.kobotoolbox.org/i/DFfrvObA',
        'Region 4A' => 'https://ee.kobotoolbox.org/i/98hHDuCK',
        'Region 4B' => 'https://ee.kobotoolbox.org/i/IUbYLOK4',
        'Region 5'  => 'https://ee.kobotoolbox.org/i/nH0grUJl',
        'Region 6'  => 'https://ee.kobotoolbox.org/i/mTWBfNfq',
        'Region 7'  => 'https://ee.kobotoolbox.org/i/5PMCYUPY',
        'Region 8'  => 'https://ee.kobotoolbox.org/i/YOXJC3Wi',
        'Region 9'  => 'https://ee.kobotoolbox.org/i/w8ZNBRC5',
        'Region 10' => 'https://ee.kobotoolbox.org/i/JmKKI0Cn',
        'Region 11' => 'https://ee.kobotoolbox.org/i/V0FlbC4S',
        'Region 12' => 'https://ee.kobotoolbox.org/i/YXKMiP5G',
        'Region 13' => 'https://ee.kobotoolbox.org/i/0yqCu52N',
    ];

    private $token = '7e3fed712cb43bce293d0bf1adc8ddf4f0b00bfa'; // Replace with your real Kobo API token
    private $client;

    public function __construct()
    {
        $this->client = Http::withHeaders([
            'Authorization' => 'Token ' . $this->token,
        ])->baseUrl('https://kc.kobotoolbox.org/api/v2');
    }

    public function show($region)
    {
        $iframeSrc = $this->iframeUrls[$region] ?? null;

        if (!$iframeSrc) {
            abort(404, 'Form not available for this region.');
        }

        return view('interventions', [
            'region' => $region,
            'iframeSrc' => $iframeSrc,
            'iframeUrls' => $this->iframeUrls, // Make sure this is passed
        ]);
    }

    public function submissions($region)
    {
        $uid = $this->forms[$region] ?? abort(404, 'Region not found.');

        $response = $this->client->get("/assets/{$uid}/data/");
        $body = $response->body();
        $results = json_decode($body, true)['results'] ?? [];

        return view('interventions_submissions', [
            'region' => $region,
            'data' => $results,
        ]);
    }

    public function summary($region)
    {
        $uid = $this->forms[$region] ?? abort(404, 'Region not found.');

        $response = $this->client->get("/assets/{$uid}/data/");
        $body = $response->body();
        $results = json_decode($body, true)['results'] ?? [];

        $summary = [
            'total_submissions' => count($results),
        ];

        return view('interventions_summary', [
            'region' => $region,
            'summary' => $summary,
            'data' => $results,
        ]);
    }
}
