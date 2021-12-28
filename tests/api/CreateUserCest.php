<?php

class CreateUserCest
{
    private static $productIdsToBeRemoved = [];

    public function _before(ApiTester $I)
    {
        $I->sendPost('/webapi/rest/auth',[
            'client_id'=>'admin',
            'client_secret'=>'krzysiek12'
        ]);
        $token = $I->grabDataFromResponseByJsonPath('$.access_token');
        $I->amBearerAuthenticated($token[0]);
    }

    // public function _after(ApiTester $I)
    // {
    //     foreach(self::$productIdsToBeRemoved as $id) {
    //         codecept_debug("Removing product: {$id}");
    //         $I->sendDelete("/webapi/rest/products/{$id}");
    //     }

    //     $res = $I->sendGet('/webapi/rest/products');
    //     $resObj = json_decode($res);
    //     echo "--------";
    //     var_dump($resObj);

    // }

    // tests
    public function tryToTest(ApiTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/json');
        $id = $I->sendPost('/webapi/rest/products', [
            'category_id' => 1,
            'producer_id' => 1,
            'translations' => [
                'pl_PL' => [
                    'name' => sprintf("test_product_%s_%s", date('Y-m-d H:i:s'), uniqid()),
                    'description' => 'product description',
                    'active' => true
                ]
            ],
            'stock' => [
                'price' => 10,
                'active' => 1,
                'stock' => 10
            ],
            'tax_id' => 1,
            'code' => '',
            'unit_id' => 1
        ]);

       // self::$productIdsToBeRemoved[] = $id;

        
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();


    }
}
