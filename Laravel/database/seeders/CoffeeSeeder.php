<?php

namespace Database\Seeders;

use App\Models\Coffee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoffeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coffees = [
            [//1
                'name' => 'Iced Americano',
                'description' => 'Rich espresso shots topped with cold water and ice.',
                'price' => 120.00,
                'category' => 'Iced Coffee',
                'image_path' => 'storage/coffees/americano.jpg',
                'is_available' => true,
            ],
            [//2
                'name' => 'Caramel Macchiato',
                'description' => 'Freshly steamed milk with vanilla-flavored syrup marked with espresso and topped with a caramel drizzle.',
                'price' => 130.00,
                'category' => 'Hot Coffee',
                'image_path' => 'storage/coffees/macchiato.jpg',
                'is_available' => true,
            ],
            [//3
                'name' => 'Matcha Latte',
                'description' => 'Smooth and creamy matcha sweetened just right and served with steamed milk.',
                'price' => 150.00,
                'category' => 'Tea',
                'image_path' => 'storage/coffees/matcha.jpg',
                'is_available' => true,
            ],
            [//4
            'name' => 'Iced Peppermint Mocha',
            'description' => 'A holiday classic with peppermint-flavored syrup and mocha sauce, topped with whipped cream.',
            'price' => 225.00,
            'category' => 'Iced Coffee',
            'image_path' => 'storage/coffees/peppermint_mocha.jpg',
            'is_available' => true,
            ],
            [//5
            'name' => 'Cappuccino',
            'description' => 'Dark, rich espresso lies under a smoothed and stretched layer of thick milk foam.',
            'price' => 165.00,
            'category' => 'Hot Coffee',
            'image_path' => 'storage/coffees/cappuccino.jpg',
            'is_available' => true,
            ],
            [//6
            'name' => 'Strawberry Shortcake Frappuccino',
            'description' => 'A blend of ice, milk, and strawberry puree layered with splashes of strawberry and whipped cream.',
            'price' => 280.00,
            'category' => 'Frappuccino',
            'image_path' => 'storage/coffees/strawberry_frap.jpg',
            'is_available' => true,
            ],
            [//7
            'name' => 'Iced Pistachio Latte',
            'description' => 'Sweet pistachio flavor paired with espresso and milk, served over ice with a salted brown-butter topping.',
            'price' => 225.00,
            'category' => 'Iced Coffee',
            'image_path' => 'storage/coffees/pistachio_latte.jpg',
            'is_available' => true,
            ],
            [//8
            'name' => 'Salted Caramel Latte',
            'description' => 'Espresso and steamed milk blended with salted caramel syrup and topped with a crunch of caramel.',
            'price' => 215.00,
            'category' => 'Hot Coffee',
            'image_path' => 'storage/coffees/salted_caramel.jpg',
            'is_available' => true,
            ],
            [//9
            'name' => 'Flat White',
            'description' => 'Smooth ristretto shots of espresso with steamed whole milk for a creamy finish.',
            'price' => 185.00,
            'category' => 'Hot Coffee',
            'image_path' => 'storage/coffees/flat_white.jpg',
            'is_available' => true,
            ],
            [//10
            'name' => 'Espresso',
            'description' => 'Our smooth signature Espresso Roast with caramelly sweetness.',
            'price' => 99.00,
            'category' => 'Hot Coffee',
            'image_path' => 'storage/coffees/espresso.jpg',
            'is_available' => true,
            ],
            [//11
            'name' => 'Sugar Cookie Latte',
            'description' => 'Sugar cookie-flavored syrup combined with Starbucks® Blonde Espresso and creamy almond milk.',
            'price' => 225.00,
            'category' => 'Seasonal',
            'image_path' => 'storage/coffees/sugar_cookie.jpg',
            'is_available' => true,
            ],
            [//12
            'name' => 'Caramel Brulée Latte',
            'description' => 'Espresso, steamed milk and rich Caramel Brulée sauce, topped with whipped cream and even more crunchy bits.',
            'price' => 210.00,
            'category' => 'Seasonal',
            'image_path' => 'storage/coffees/caramel_brulee.jpg',
            'is_available' => true,
        ],
        [//13
            'name' => 'Chai Tea Cream Frappuccino',
            'description' => 'A creamy blend of spicy chai, milk, and ice, topped with whipped cream and a dash of cinnamon.',
            'price' => 205.00,
            'category' => 'Frappuccino',
            'image_path' => 'coffees/chai_cream_frap.jpg',
            'is_available' => true,
        ],
        [//14
            'name' => 'Vanilla Cream Frappuccino',
            'description' => 'A creamy blend of vanilla bean, milk, and ice, topped with whipped cream for a classic finish.',
            'price' => 200.00,
            'category' => 'Frappuccino',
            'image_path' => 'coffees/vanilla_cream_frap.jpg',
            'is_available' => true,
        ],
        [//15
            'name' => 'Dark Caramel Coffee Frappuccino',
            'description' => 'Coffee, milk, and dark caramel sauce blended with ice, topped with whipped cream and caramel drizzle.',
            'price' => 225.00,
            'category' => 'Frappuccino',
            'image_path' => 'coffees/dark_caramel_frap.jpg',
            'is_available' => true,
        ],
        [//16
            'name' => 'Triple Mocha Frappuccino',
            'description' => 'Layers of dark mocha sauce, whipped cream, and chocolate coffee blended for the ultimate mocha lover.',
            'price' => 235.00,
            'category' => 'Frappuccino',
            'image_path' => 'coffees/triple_mocha_frap.jpg',
            'is_available' => true,
        ],
        [//17
            'name' => 'Coffee Jelly Frappuccino',
            'description' => 'Coffee blended with milk and ice, layered over our signature coffee jelly for a delightful texture.',
            'price' => 215.00,
            'category' => 'Frappuccino',
            'image_path' => 'coffees/coffee_jelly_frap.jpg',
            'is_available' => true,
        ],
        [//18
            'name' => 'Java Chip Frappuccino',
            'description' => 'Coffee, milk, and ice blended with chocolate chips and mocha sauce, topped with whipped cream.',
            'price' => 230.00,
            'category' => 'Frappuccino',
            'image_path' => 'coffees/java_chip_frap.jpg',
            'is_available' => true,
        ],
        [//19
            'name' => 'Mocha Frappuccino',
            'description' => 'Mocha sauce, coffee, milk, and ice all blended together and finished with whipped cream.',
            'price' => 210.00,
            'category' => 'Frappuccino',
            'image_path' => 'coffees/mocha_frap.jpg',
            'is_available' => true,
        ],
        [//20
            'name' => 'Pure Matcha Cream Frappuccino',
            'description' => 'A smooth and creamy blend of premium micro-ground matcha, milk, and ice, topped with whipped cream.',
            'price' => 215.00,
            'category' => 'Frappuccino',
            'image_path' => 'coffees/matcha_cream_frap.jpg',
            'is_available' => true,
        ],
    ];

        foreach ($coffees as $coffee) {
            Coffee::create($coffee);
        }
    }
}

// //list of the menu
// 1. Iced Americano
// 2. Caramel Macchiato
// 3. Matcha Latte
// 4. Iced Peppermint Mocha
// 5. Cappuccino
// 6. Strawberry Shortcake Frappuccino®
// 7. Iced Pistachio Latte
// 8. Salted Caramel Latte
// 9. Flat White
// 10. Espresso
// 11. Sugar Cookie Latte
// 12. Caramel Brulée Latte
// 13. Chai Tea Cream Frappuccino
// 14. Vanilla Cream Frappuccino
// 15. Dark Caramel Coffee Frappuccino
// 16. Triple Mocha Frappuccino
// 17. Coffee Jelly Frappuccino
// 18. Java Chip Frappuccino
// 19. Mocha Frappuccino
// 20. Pure Matcha Cream Frappuccino
