<?php


function send_order_mandae ($items) {
    // Informações API
    $urlApi = "https://api.mandae.com.br/v2/";
    $urlApiAddOrder = "${urlApi}orders/add-parcel";
    $token = "b29d6e5384b5d0f6c515f07d764cbbb0";
    $customerId = "BF50B91752284407A16E09901A3B2C34";
    $prefixoRastreamento = "RBJ";


    // Dados que serão enviados na requisição
    $data = [
        "customerId" => $customerId,
        "sellerId" => "YOUR_SELLER_ID_HERE",
        "items" => [
            [
                "volumes" => [
                    [
                        "volumeId" => "ABCDE00001V1",
                        "dimensions" => [
                            "height" => "0",
                            "width" => "0",
                            "length" => "0",
                            "weight" => "0"
                        ]
                    ],
                    [
                        "volumeId" => "ABCDE00001V2",
                        "dimensions" => [
                            "height" => "0",
                            "width" => "0",
                            "length" => "0",
                            "weight" => "0"
                        ]
                    ]
                ],
                "skus" => [
                    [
                        "skuId" => "SKU-001",
                        "description" => "Bermuda SKU Variação 1 Azul",
                        "ean" => "SKUVR1",
                        "price" => 46.51,
                        "quantity" => 1
                    ],
                    [
                        "skuId" => "SKU-002",
                        "description" => "Camisa SKU Variação 2 Vermelha",
                        "ean" => "SKUVR2",
                        "price" => 100.00,
                        "quantity" => 1
                    ]
                ],
                "invoice" => [
                    "id" => "12345678-9",
                    "key" => "12345678901234567890123456789012345678901234",
                    "type" => "NFe"
                ],
                "carrierInvoice" => [
                    "id" => "12345678-9",
                    "key" => "12345678901234567890123456789012345678901234",
                    "type" => "CTe"
                ],
                "trackingId" => "ABCDE00001",
                "partnerItemId" => "252512-00001",
                "observation" => "Item frágil",
                "recipient" => [
                    "fullName" => "João Destinatário",
                    "phone" => "11911111111",
                    "email" => "exemplo-contato@mandae.com.br",
                    "document" => "CPF_OR_CNPJ_HERE",
                    "address" => [
                        "postalCode" => "05305070",
                        "street" => "Rua Padre Meliton Vigueira Penillos",
                        "number" => "132",
                        "neighborhood" => "Vila Leopoldina",
                        "addressLine2" => "Apto 255",
                        "city" => "São Paulo",
                        "state" => "SP",
                        "country" => "BR",
                        "reference" => "Próximo a estação CPTM Vila Leopoldina"
                    ]
                ],
                "sender" => [
                    "fullName" => "João Remetente",
                    "phone" => "11911111111",
                    "email" => "exemplo-contato@mandae.com.br",
                    "document" => "CNPJ_HERE",
                    "ie" => "INSCRICAO_ESTADUAL_HERE",
                    "corporateReason" => "Razão Social",
                    "address" => [
                        "postalCode" => "05305070",
                        "street" => "Rua Padre Meliton Vigueira Penillos",
                        "number" => "132",
                        "neighborhood" => "Vila Leopoldina",
                        "addressLine2" => "Apto 255",
                        "city" => "São Paulo",
                        "state" => "SP",
                        "country" => "BR",
                        "reference" => "Próximo a estação CPTM Vila Leopoldina"
                    ]
                ],
                "shippingService" => "Rápido",
                "valueAddedServices" => [
                    [
                        "name" => "ValorDeclarado",
                        "value" => 146.51
                    ]
                ],
                "channel" => "ecommerce",
                "store" => "Sample Store",
                "totalValue" => 42.0,
                "totalFreight" => 3.14
            ]
        ],
        "observation" => null
    ];

    // Inicializando cURL
    $ch = curl_init($urlApiAddOrder);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: ' . $token,
        'Content-Type: application/json'
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        return 'Erro: ' . curl_error($ch);
    } else {
        return 'Resposta: ' . $response;
    }
    curl_close($ch);



}



?>