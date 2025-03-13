<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class AppMax_Controller extends Controller
{

    private $url = 'https://homolog.sandboxappmax.com.br/api/v3/';
    private $token_homologacao = 'DFED62FB-53F0A3BB-842D0EDF-FC18D5B0';

    public function Cadastrar_cliente_App_Max($request)
    {
        

        $nomeCompleto = $request->input_nome_cliente;

        $partes = explode(' ', trim($nomeCompleto), 2);

        $firstName = $partes[0]; // Primeiro nome
        $lastName = $partes[1] ?? 'N/A'; // Restante do nome ou "N/A" se não houver

        $DDD_contato=$request->input_DDD;
        $numero_contato=$request->input_numero_contato;

        $telefone_completo=$DDD_contato . $numero_contato;

        $response = Http::post($this->url."customer", [
            'access-token' => $this->token_homologacao,
            'firstname' => $firstName,
            'lastname' => $lastName,
            'email' => $request->input_email_cliente,
            'telephone' => $telefone_completo,
            'postcode' => $request->input_CEP,
            'address_street' => $request->input_nome_rua,
            'address_street_number' => $request->input_numero_rua,
            'address_street_complement' => $request->input_CEP,
            'address_street_district' => $request->input_bairro,
            'address_city' => $request->input_cidade,
            'address_state' => $request->input_estado,
            'ip' => $request->ip()
        ]);

        return response()->json($response->json());
    } // public function Cadastrar_cliente_App_Max($request)



    public function Cadastrar_pedido_App_Max($request, $id_cliente)
    {
        //// Json do pedido

        $response = Http::post($this->url."order", [
        "access-token" => $this->token_homologacao,  // Substitua com o seu token de acesso
        "products" => [
            [
                    "sku" => "123123",
                    "name" => "My product 1",
                    "qty" => 1,
                    "price" => 5.00,
                ],
                [
                    "sku" => "234234",
                    "name" => "My product 2",
                    "qty" => 2,
                    "digital_product" => 1,
                    "price" => 3.00,
                ]
            ],
            "shipping" => 39.90,
            "customer_id" => $id_cliente, // Substitua pelo ID do cliente
            "discount" => 0,
            "freight_type" => "PAC"
        ]);

        return response()->json($response->json());

    }

    public function Gerar_Pix($id_pedido, $id_cliente, $CPF_cliente)
    {

        $expiration_date = Carbon::now()->addDays(1)->format('Y-m-d H:i:s');

        $response = Http::post($this->url."payment/pix", [
            'access-token' => $this->token_homologacao,
            'cart' => [
                'order_id' => $id_pedido
            ],
            'customer' => [
                'customer_id' => $id_cliente
            ],
            'payment' => [
                'pix' => [
                    'document_number' => $CPF_cliente,
                    'expiration_date' => $expiration_date
                ]
            ]
        ]);

        return $response->json();
    }

}
