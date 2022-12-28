<?php

namespace Tests\Feature;

use Illuminate\Support\Str;
use Tests\TestCase;

class Exercise3 extends TestCase
{
    /**
     * // todo
     * - [ ] Has battery false and battery_duration null or not on the request
     * @test
     */
    public function given_a_rigth_information_we_expect_to_return_200()
    {
        $formInput = [
            "name" => "Keyboard",
            "description" => "Mechanical RGB Keyboard",
            "price" => 200,
            "has_battery" => true,
            "battery_duration" => 8,
            "colors" => [
                "blue",
                "white",
                "black"
            ],
            "dimensions" => [
                "width" => 40,
                "height" => 5,
                "length" => 20
            ],
            "accessories" => [
                [
                    "name" => "Wrist rest",
                    "price" => 20
                ],
                [
                    "name" => "Keycaps",
                    "price" => 15
                ]
            ]
        ];

        $response = $this->post('/ejercicio3', $formInput);
        $response->assertStatus(200);
    }


    final public function requiredFieldsProvider(): \Generator
    {
        yield 'null description' => [
            [
                "name" => "Keyboard",
                "description" => null,
                "price" => 200,
                "has_battery" => true,
                "battery_duration" => 8,
                "colors" => [
                    "blue",
                    "white",
                    "black"
                ],
                "dimensions" => [
                    "width" => 40,
                    "height" => 5,
                    "length" => 20
                ],
                "accessories" => [
                    [
                        "name" => "Wrist rest",
                        "price" => 20
                    ],
                    [
                        "name" => "Keycaps",
                        "price" => 15
                    ]
                ]
            ]
        ];

        yield 'without description' => [
            [
                "name" => "Keyboard",
                "description" => null,
                "price" => 200,
                "has_battery" => true,
                "battery_duration" => 8,
                "colors" => [
                    "blue",
                    "white",
                    "black"
                ],
                "dimensions" => [
                    "width" => 40,
                    "height" => 5,
                    "length" => 20
                ],
                "accessories" => [
                    [
                        "name" => "Wrist rest",
                        "price" => 20
                    ],
                    [
                        "name" => "Keycaps",
                        "price" => 15
                    ]
                ]
            ]
        ];

        yield 'null name' => [
            [
                "name" => null,
                "description" => "Mechanical RGB Keyboard",
                "price" => 200,
                "has_battery" => true,
                "battery_duration" => 8,
                "colors" => [
                    "blue",
                    "white",
                    "black"
                ],
                "dimensions" => [
                    "width" => 40,
                    "height" => 5,
                    "length" => 20
                ],
                "accessories" => [
                    [
                        "name" => "Wrist rest",
                        "price" => 20
                    ],
                    [
                        "name" => "Keycaps",
                        "price" => 15
                    ]
                ]
            ]
        ];

        yield 'without name' => [
            [
                "description" => "Mechanical RGB Keyboard",
                "price" => 200,
                "has_battery" => true,
                "battery_duration" => 8,
                "colors" => [
                    "blue",
                    "white",
                    "black"
                ],
                "dimensions" => [
                    "width" => 40,
                    "height" => 5,
                    "length" => 20
                ],
                "accessories" => [
                    [
                        "name" => "Wrist rest",
                        "price" => 20
                    ],
                    [
                        "name" => "Keycaps",
                        "price" => 15
                    ]
                ]
            ]
        ];
        yield 'without price' => [
            [
                "name" => "Keyboard",
                "description" => "Mechanical RGB Keyboard",
                "has_battery" => true,
                "battery_duration" => 8,
                "colors" => [
                    "blue",
                    "white",
                    "black"
                ],
                "dimensions" => [
                    "width" => 40,
                    "height" => 5,
                    "length" => 20
                ],
                "accessories" => [
                    [
                        "name" => "Wrist rest",
                        "price" => 20
                    ],
                    [
                        "name" => "Keycaps",
                        "price" => 15
                    ]
                ]
            ]
        ];

        yield 'null price' => [
            [
                "name" => "Keyboard",
                "description" => "Mechanical RGB Keyboard",
                "price" => null,
                "has_battery" => true,
                "battery_duration" => 8,
                "colors" => [
                    "blue",
                    "white",
                    "black"
                ],
                "dimensions" => [
                    "width" => 40,
                    "height" => 5,
                    "length" => 20
                ],
                "accessories" => [
                    [
                        "name" => "Wrist rest",
                        "price" => 20
                    ],
                    [
                        "name" => "Keycaps",
                        "price" => 15
                    ]
                ]
            ]
        ];

        yield 'without has_battery' => [
            [
                "name" => "Keyboard",
                "description" => "Mechanical RGB Keyboard",
                "price" => 200,
                "battery_duration" => 8,
                "colors" => [
                    "blue",
                    "white",
                    "black"
                ],
                "dimensions" => [
                    "width" => 40,
                    "height" => 5,
                    "length" => 20
                ],
                "accessories" => [
                    [
                        "name" => "Wrist rest",
                        "price" => 20
                    ],
                    [
                        "name" => "Keycaps",
                        "price" => 15
                    ]
                ]
            ]
        ];

        yield 'without colors' => [
            [
                "name" => "Keyboard",
                "description" => "Mechanical RGB Keyboard",
                "price" => 200,
                "has_battery" => true,
                "battery_duration" => 8,
                "dimensions" => [
                    "width" => 40,
                    "height" => 5,
                    "length" => 20
                ],
                "accessories" => [
                    [
                        "name" => "Wrist rest",
                        "price" => 20
                    ],
                    [
                        "name" => "Keycaps",
                        "price" => 15
                    ]
                ]
            ]
        ];

        yield 'without dimensions' => [
            [
                "name" => "Keyboard",
                "description" => "Mechanical RGB Keyboard",
                "price" => 200,
                "has_battery" => true,
                "battery_duration" => 8,
                "colors" => [
                    "blue",
                    "white",
                    "black"
                ],
                "accessories" => [
                    [
                        "name" => "Wrist rest",
                        "price" => 20
                    ],
                    [
                        "name" => "Keycaps",
                        "price" => 15
                    ]
                ]
            ]
        ];

        yield 'without accessories' => [
            [
                "name" => "Keyboard",
                "description" => "Mechanical RGB Keyboard",
                "price" => 200,
                "has_battery" => true,
                "battery_duration" => 8,
                "colors" => [
                    "blue",
                    "white",
                    "black"
                ],
                "dimensions" => [
                    "width" => 40,
                    "height" => 5,
                    "length" => 20
                ],

            ]
        ];

        yield 'name with more than 64 chars' => [
            [
                "name" => Str::random(65),
                "description" => "Mechanical RGB Keyboard",
                "price" => 200,
                "has_battery" => true,
                "battery_duration" => 8,
                "colors" => [
                    "blue",
                    "white",
                    "black"
                ],
                "dimensions" => [
                    "width" => 40,
                    "height" => 5,
                    "length" => 20
                ],
                "accessories" => [
                    [
                        "name" => "Wrist rest",
                        "price" => 20
                    ],
                    [
                        "name" => "Keycaps",
                        "price" => 15
                    ]
                ]
            ]
        ];

        yield 'description with more than 512 chars' => [
            [
                "name" => "Keyboard",
                "description" => Str::random(513),
                "price" => 200,
                "has_battery" => true,
                "battery_duration" => 8,
                "colors" => [
                    "blue",
                    "white",
                    "black"
                ],
                "dimensions" => [
                    "width" => 40,
                    "height" => 5,
                    "length" => 20
                ],
                "accessories" => [
                    [
                        "name" => "Wrist rest",
                        "price" => 20
                    ],
                    [
                        "name" => "Keycaps",
                        "price" => 15
                    ]
                ]
            ]
        ];

        yield 'negative price' => [
            [
                "name" => "Keyboard",
                "description" => "Mechanical RGB Keyboard",
                "price" => -200,
                "has_battery" => true,
                "battery_duration" => 8,
                "colors" => [
                    "blue",
                    "white",
                    "black"
                ],
                "dimensions" => [
                    "width" => 40,
                    "height" => 5,
                    "length" => 20
                ],
                "accessories" => [
                    [
                        "name" => "Wrist rest",
                        "price" => 20
                    ],
                    [
                        "name" => "Keycaps",
                        "price" => 15
                    ]
                ]
            ]
        ];

        yield 'price of 0' => [
            [
                "name" => "Keyboard",
                "description" => "Mechanical RGB Keyboard",
                "price" => 0,
                "has_battery" => true,
                "battery_duration" => 8,
                "colors" => [
                    "blue",
                    "white",
                    "black"
                ],
                "dimensions" => [
                    "width" => 40,
                    "height" => 5,
                    "length" => 20
                ],
                "accessories" => [
                    [
                        "name" => "Wrist rest",
                        "price" => 20
                    ],
                    [
                        "name" => "Keycaps",
                        "price" => 15
                    ]
                ]
            ]
        ];

        yield 'has_battery must be boolean' => [
            [
                "name" => "Keyboard",
                "description" => "Mechanical RGB Keyboard",
                "price" => 10,
                "has_battery" => 98,
                "battery_duration" => 8,
                "colors" => [
                    "blue",
                    "white",
                    "black"
                ],
                "dimensions" => [
                    "width" => 40,
                    "height" => 5,
                    "length" => 20
                ],
                "accessories" => [
                    [
                        "name" => "Wrist rest",
                        "price" => 20
                    ],
                    [
                        "name" => "Keycaps",
                        "price" => 15
                    ]
                ]
            ]
        ];

        yield 'each color must be a string' => [
            [
                "name" => "Keyboard",
                "description" => "Mechanical RGB Keyboard",
                "price" => 10,
                "has_battery" => true,
                "battery_duration" => 8,
                "colors" => [
                    7,
                    true,
                ],
                "dimensions" => [
                    "width" => 40,
                    "height" => 5,
                    "length" => 20
                ],
                "accessories" => [
                    [
                        "name" => "Wrist rest",
                        "price" => 20
                    ],
                    [
                        "name" => "Keycaps",
                        "price" => 15
                    ]
                ]
            ]
        ];

        yield 'each dimension must be a positive number' => [
            [
                "name" => "Keyboard",
                "description" => "Mechanical RGB Keyboard",
                "price" => 10,
                "has_battery" => true,
                "battery_duration" => 8,
                "colors" => [
                    "blue",
                    "white",
                    "black"
                ],
                "dimensions" => [
                    "width" => -40,
                    "height" => -50,
                    "length" => -20
                ],
                "accessories" => [
                    [
                        "name" => "Wrist rest",
                        "price" => 20
                    ],
                    [
                        "name" => "Keycaps",
                        "price" => 15
                    ]
                ]
            ]
        ];

        yield 'each dimension must be a bigger than 0' => [
            [
                "name" => "Keyboard",
                "description" => "Mechanical RGB Keyboard",
                "price" => 10,
                "has_battery" => true,
                "battery_duration" => 8,
                "colors" => [
                    "blue",
                    "white",
                    "black"
                ],
                "dimensions" => [
                    "width" => 0,
                    "height" => 0,
                    "length" => 0
                ],
                "accessories" => [
                    [
                        "name" => "Wrist rest",
                        "price" => 20
                    ],
                    [
                        "name" => "Keycaps",
                        "price" => 15
                    ]
                ]
            ]
        ];

        yield 'each dimension must have width, height and length' => [
            [
                "name" => "Keyboard",
                "description" => "Mechanical RGB Keyboard",
                "price" => 10,
                "has_battery" => true,
                "battery_duration" => 8,
                "colors" => [
                    "blue",
                    "white",
                    "black"
                ],
                "dimensions" => [
                    "A_RANDOM_KEY" => 50,
                ],
                "accessories" => [
                    [
                        "name" => "Wrist rest",
                        "price" => 20
                    ],
                    [
                        "name" => "Keycaps",
                        "price" => 15
                    ]
                ]
            ]
        ];

        yield 'accessories must be an array' => [
            [
                "name" => "Keyboard",
                "description" => "Mechanical RGB Keyboard",
                "price" => 10,
                "has_battery" => true,
                "battery_duration" => 8,
                "colors" => [
                    "blue",
                    "white",
                    "black"
                ],
                "dimensions" => [
                    "width" => 40,
                    "height" => 5,
                    "length" => 20
                ],
                "accessories" => 'A_RANDOM_STRING'
            ]
        ];

        yield 'accessories price must be required' => [
            [
                "name" => "Keyboard",
                "description" => "Mechanical RGB Keyboard",
                "price" => 10,
                "has_battery" => true,
                "battery_duration" => 8,
                "colors" => [
                    "blue",
                    "white",
                    "black"
                ],
                "dimensions" => [
                    "width" => 40,
                    "height" => 5,
                    "length" => 20
                ],
                "accessories" => [
                    [
                        "name" => "Wrist rest",

                    ],
                    [
                        "name" => "Keycaps",

                    ]
                ]
            ]
        ];


        yield 'accessories price must be bigger than 0' => [
            [
                "name" => "Keyboard",
                "description" => "Mechanical RGB Keyboard",
                "price" => 10,
                "has_battery" => true,
                "battery_duration" => 8,
                "colors" => [
                    "blue",
                    "white",
                    "black"
                ],
                "dimensions" => [
                    "width" => 40,
                    "height" => 5,
                    "length" => 20
                ],
                "accessories" => [
                    [
                        "name" => "Wrist rest",
                        "price" => -9
                    ],
                    [
                        "name" => "Keycaps",
                        "price" => -8
                    ]
                ]
            ]
        ];

        yield 'accessories name must be required' => [
            [
                "name" => "Keyboard",
                "description" => "Mechanical RGB Keyboard",
                "price" => 10,
                "has_battery" => true,
                "battery_duration" => 8,
                "colors" => [
                    "blue",
                    "white",
                    "black"
                ],
                "dimensions" => [
                    "width" => 40,
                    "height" => 5,
                    "length" => 20
                ],
                "accessories" => [
                    [

                        "price" => 20
                    ],
                    [

                        "price" => 15
                    ]
                ]
            ]
        ];

        yield 'accessories name must be a string' => [
            [
                "name" => "Keyboard",
                "description" => "Mechanical RGB Keyboard",
                "price" => 10,
                "has_battery" => true,
                "battery_duration" => 8,
                "colors" => [
                    "blue",
                    "white",
                    "black"
                ],
                "dimensions" => [
                    "width" => 40,
                    "height" => 5,
                    "length" => 20
                ],
                "accessories" => [
                    [
                        "name" => 9,
                        "price" => 20
                    ],
                    [
                        "name" => true,
                        "price" => 15
                    ]
                ]
            ],
        ];
    }

    /**
     * @dataProvider requiredFieldsProvider
     * @test
     */
    public function given_a_bad_request_field_we_expect_to_return_302(array $formInput)
    {
        $response = $this->post('/ejercicio3', $formInput);
        $response->assertStatus(302);
    }

    /** @test */
    public function all_fields_wrong() {
        $response = $this->post('/ejercicio3', [
            'name' => null,
            'description' => null,
            'price' => -100,
            'has_battery' => true,
            'battery_duration' => -5,
            'colors' => [null, 'white', 'black'],
            'dimensions' => ['width' => -5, 'height' => 5, 'length' => -5],
            'accessories' => [
                ['name' => 'Wrist rest', 'price' => -5],
                ['name' => null, 'price' => 0.0]
            ]
        ]);

        $response->assertSessionHasErrors([
            'name',
            'description',
            'price',
            'colors.0',
            'dimensions.width',
            'dimensions.length',
            'accessories.0.price',
            'accessories.1.name',
            'accessories.1.price',
        ]);
    }
}
