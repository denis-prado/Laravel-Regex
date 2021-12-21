<?php

namespace App\Service;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CarroService
{
    public static function requestVehiclesSite(string $term)
    {
        // Obtendo Veículos
        $response = Http::get(env('ENDPOINT_SITE').$term);
        // Removendo quebra de linhas
        $response = preg_replace('/(\r\n|\n|\t|\r)/', "", $response->body());
        // Removendo espaços extras
        $response = preg_replace('/( )+/', " ", $response);
        // Capturando article dos veículos na página
        preg_match_all('/<(article)\s+class="card clearfix"(?>)(.*)<\/\1>/U', $response, $vehicles);

        $i = 0;
        foreach ($vehicles[0] as $vehicle) {
            // Obtendo informações: Links | Titulos
            preg_match_all('/<(a)\s+href=(?>)(.*)<\/\1>/U', $vehicle, $linksAndTitles);

            $replacements = ['<a href="', '</a>', '"'];
            $linksAndTitles = str_replace($replacements, "", $linksAndTitles[0][1]);

            $linksAndTitles = explode(">", $linksAndTitles);
            $vehicleData = [];
            $vehicleData['link'] = $linksAndTitles[0];
            $vehicleData['nome_veiculo'] = $linksAndTitles[1];
            $vehicleData['user_id'] = Auth::id();

            // Obtendo informações: Ano | Quilometragem | Combústivel | Câmbio | Portas
            preg_match_all('/<(li)\s+class="card-list__row"(?>)(.*)<\/\1>/U', $vehicle, $TitlesAndInformation);
            $listAttributes = [];
            $k = 0;
            foreach ($TitlesAndInformation[0] as $TitleAndInfo) {
                $siteAttributes = trim(preg_replace('/( )+/', " ", strip_tags($TitleAndInfo)));
                switch ($k) {
                    case 0:
                        $vehicleData['ano'] = CarroService::prepareAttributes($siteAttributes);
                        break;
                    case 1:
                        $vehicleData['quilometragem'] = CarroService::prepareAttributes($siteAttributes);
                        break;
                    case 2:
                        $vehicleData['combustivel'] = CarroService::prepareAttributes($siteAttributes);
                        break;
                    case 3:
                        $vehicleData['cambio'] = CarroService::prepareAttributes($siteAttributes);
                        break;
                    case 4:
                        $vehicleData['portas'] = intval(CarroService::prepareAttributes($siteAttributes));
                        break;
                    case 5:
                        $vehicleData['cor'] = CarroService::prepareAttributes($siteAttributes);
                        break;
                }
                $k++;
            }

            // $vehicleData['attributes'] = $listAttributes;

            $vehicleList[$i] = $vehicleData;

            $i++;
        }

        return $vehicleList ?? false;
    }

    private static function prepareAttributes(string $attributes): string
    {
        $attributes = explode(":", $attributes);
        return trim($attributes[1]);
    }
}
