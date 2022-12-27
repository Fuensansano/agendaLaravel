<?php

namespace Tests\Feature;

use Tests\TestCase;

class Exercise2 extends TestCase
{
    /** @test */
    public function given_a_request_with_name_description_and_price_should_return_a_json_with_same_info()
    {
        $name ='A_RANDOM_NAME';
        $description = 'A_RANDOM_DESCRIPTION';
        $price = 200;

        $response = $this->post('/ejercicio2/a', [
            "name" => $name,
            "description" => $description,
            "price" => $price
        ]);

        $response->assertJson([
            "name" => $name,
            "description" => $description,
            "price" => $price
        ]);

        $response->assertStatus(200);
    }

    /** @test */
    public function given_a_request_with_name_description_and_a_negative_price_should_return_a_json_with_same_info()
    {
        $name ='A_RANDOM_NAME';
        $description = 'A_RANDOM_DESCRIPTION';
        $price = -200;

        $response = $this->post('/ejercicio2/a', [
            "name" => $name,
            "description" => $description,
            "price" => $price
        ]);

        $response->assertJson([
            "name" => $name,
            "description" => $description,
            "price" => $price
        ]);

        $response->assertStatus(200);
    }

    /** @test */
    public function given_a_request_with_name_description_and_a_negative_price_should_return_a_json_with_message()
    {
        $name ='A_RANDOM_NAME';
        $description = 'A_RANDOM_DESCRIPTION';

        $response = $this->post('/ejercicio2/b', [
            "name" => $name,
            "description" => $description,
            "price" => -36
        ]);

        $response->assertJson([
            "message" => "Price can't be less than 0"
        ]);

        $response->assertStatus(422);
    }

    /** @test */
    public function given_a_request_with_name_description_and_price_should_return_a_json_but_in_ejercicio2_b()
    {
        $name ='A_RANDOM_NAME';
        $description = 'A_RANDOM_DESCRIPTION';
        $price = 200;

        $response = $this->post('/ejercicio2/b', [
            "name" => $name,
            "description" => $description,
            "price" => $price
        ]);

        $response->assertJson([
            "name" => $name,
            "description" => $description,
            "price" => $price
        ]);

        $response->assertStatus(200);
    }


    function requestWithDiscounts() {
        yield 'Discount Save15 with price 200' => ['SAVE15', 200, 15, 170 ];
        yield 'Discount Save15 with price 100' => ['SAVE15', 100, 15, 85 ];
        yield 'Discount Save10 with price 200' => ['SAVE10', 200, 10, 180 ];
        yield 'Discount Save10 with price 100' => ['SAVE10', 100, 10, 90 ];
        yield 'Discount Save5 with price 200' => ['SAVE5', 200, 5, 190 ];
        yield 'Discount Save5 with price 100' => ['SAVE5', 100, 5, 95 ];
        yield 'Discount Save25 with price 100' => ['SAVE25', 100, 0, 100 ];
        yield 'Discount Save50 with price 100' => ['SAVE50', 100, 0, 100 ];
        yield 'not discount with price 100' => ['', 100, 0, 100 ];
    }

    /**
     * @dataProvider requestWithDiscounts
     * @test
     */
    public function given_a_request_with_discounts_should_return_a_rigth_price(string $discountCode, int $price, int $discount, int $priceWithDiscount)
    {
        $name ='A_RANDOM_NAME';
        $description = 'A_RANDOM_DESCRIPTION';

        $response = $this->post("/ejercicio2/c?discount=$discountCode", [
            "name" => $name,
            "description" => $description,
            "price" => $price
        ]);

        $response->assertJson([
            "name" => $name,
            "description" => $description,
            "price" => $priceWithDiscount,
            "discount" => $discount
        ]);

        $response->assertStatus(200);
    }

    /** @test */
    public function given_a_request_without_discounts_should_return_a_rigth_price()
    {
        $name ='A_RANDOM_NAME';
        $description = 'A_RANDOM_DESCRIPTION';

        $price = 300;
        $response = $this->post('/ejercicio2/c', [
            "name" => $name,
            "description" => $description,
            "price" => $price
        ]);

        $response->assertJson([
            "name" => $name,
            "description" => $description,
            "price" => $price,
            "discount" => 0
        ]);

        $response->assertStatus(200);
    }
}


