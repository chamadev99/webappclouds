<?php

namespace App\Service;

use App\Interface\ApiInterface;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApiService implements ApiInterface
{

    public function filter($category)
    {
        try {
            $response = Http::withHeaders([
                'x-rapidapi-host' => config('services.rapidapi.host'),
                'x-rapidapi-key'  => config('services.rapidapi.key'),
            ])->get(config('services.rapidapi.base_url') . '/pizzas');


            if ($response->successful()) {
                return $response->json();
            }

            Log::warning('RapidAPI responded with an error', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            throw new Exception('API responded with error: ' . $response->status());
        } catch (\Exception $e) {

            Log::error('Exception during API call to RapidAPI', ['message' => $e->getMessage()]);

            throw $e;
        }
    }

    public function getItem($id)
    {
        try {
            $response = Http::withHeaders([
                'x-rapidapi-host' => config('services.rapidapi.host'),
                'x-rapidapi-key'  => config('services.rapidapi.key'),
            ])->get(config('services.rapidapi.base_url') . '/pizzas' . '/' . $id);


            if ($response->successful()) {
                return $response->json();
            }

            Log::warning('RapidAPI responded with an error', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            throw new Exception('API responded with error: ' . $response->status());
        } catch (\Exception $e) {

            Log::error('Exception during API call to RapidAPI', ['message' => $e->getMessage()]);

            throw $e;
        }
    }
}
