<?php
class Weather {
    private $apiKey = "YOUR_OPENWEATHERMAP_API_KEY";
    private $baseUrl = "http://api.openweathermap.org/data/2.5/weather";
    private $location = "Augusta,GA,US";
    public function getCurrentWeather() {
        $url = $this->baseUrl . "?q=" . urlencode($this->location) . "&appid=" . $this->apiKey . "&units=imperial";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);
        return isset($data["cod"]) && $data["cod"] == 200 ? [
            "temp" => $data["main"]["temp"],
            "description" => $data["weather"][0]["description"],
            "icon" => $data["weather"][0]["icon"]
        ] : ["error" => "Weather data unavailable"];
    }
}

