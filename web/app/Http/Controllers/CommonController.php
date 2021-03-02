<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

class CommonController extends Controller
{
    /*
     * Efetua a busca no site htt://viacep.com.br
     * */
    public function buscaCEP(Request $request) {
        $cep = str_replace("-", "", str_replace(".", "", $request->get('cep')));
        $url = "http://viacep.com.br/ws/" . $cep . "/json/";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);            // No header in the result
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return, do not echo result

        $result = curl_exec($ch);
        curl_close($ch);

        $jsonRetorno = json_decode($result, true);

        $jsonRetorno['pais'] = 'Brasil';
        $strRetorno["erro"] = false;
        if (array_key_exists("erro", $jsonRetorno)) {
            if ($jsonRetorno["erro"] == true)
                $strRetorno["erro"] = true;
            else
                $strRetorno["erro"] = false;
        } else {
            $strRetorno["jsonRetorno"] = $jsonRetorno;
        }

        return response()->json($strRetorno);
    }
}
