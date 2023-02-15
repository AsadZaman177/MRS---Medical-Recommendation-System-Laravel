<?php

use App\CMS;
use Illuminate\Database\Seeder;

class CMSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $cms = [
            [
                'section_id' => 'genral',
                'logo' => 'logo.png',
                'name' => 'MRS',
                'email' => 'info@mrs.com',
                'address' => '15/A, Isamabad,Pakistan',
                'phone' => '+987-6543210',
                'facebook' => 'https://facebook.com',
                'instagram' => 'https://instagram.com',
                'twitter' => 'https://twitter.com',
                'youtube' => 'https://youtube.com',
                'cta_text' => 'Buy medical disposable face mask to protect your loved ones',
                'cta_btn_text' => 'Shop Now',
                'footer_about' => 'Lorem Ipsum is simply dummy text of the and typesetting industry. Lorem Ipsum is dummy text of the printing.',
                'footer_certificate' => 'certificate.png',
                'footer_payment' => 'payment.png',
                'copyright' => 'All Rights Reserved @ MRS',
            ], 

            [
                'section_id' => 'home',
                'page_title' => 'MEDICINE CENTER & SMART DOCTOR!',
                'page_desc' => 'Pakistan leading digital healthcare plateform brings you complete health facilities right to your doorstep.',
                'search_widget_img' => 'search-medicine.png',
                'search_widget_title' => 'Search',
                'search_widget_desc' => 'Search your medicine and other subsitutes in just few clicks.',
                'buy_widget_img' => 'buy-medicine.png',
                'buy_widget_title' => 'Buy',
                'buy_widget_desc' => 'Add medicine to your cart and place your order.',
                'diagnose_img' => 'diagnosis.png',
                'diagnose_title' => 'Diagnose',
                'diagnose_desc' => 'Enter disease symptoms to diagnosis and recommended medicines.',
                'free_ship_icon' => '8-trolley.svg',
                'free_ship_title' => 'Free shipping',
                'free_ship_desc'=>'On all orders over $49.00',
                'return_icon'=>'9-money.svg',
                'return_title'=>'15 days returns',
                'return_desc'=>'Moneyback guarantee',
                'secure_icon'=>'10-credit-card.svg',
                'secure_title'=>'Secure checkout',
                'secure_desc'=>'Protected by Paypal',
                'gifts_icon'=>'11-gift-card.svg',
                'gifts_title'=>'Offer & gift here',
                'gifts_desc'=>'On all orders over',
                'our_products_title'=>'Our Products',
                'our_products_desc'=>'A highly efficient slip-ring scanner for today diagnostic requirements.',
                'countdown_subheading'=>'Todays Hot Offer',
                'countdown_heading'=>'Buy all your medicines at 50% offer',
                'countdown_desc'=>'Get extra cashback with great deals and discounts',
                'countdown_img'=>'27.jpg',
                'countdown_date'=>'2023/11/22' ,
                'sale_products_title'=>'Medicines On Sale',
                'sale_products_desc'=>'A highly efficient slip-ring scanner for today diagnostic requirements',
                'featured_products_title'=>'Featured Products',
                'featured_products_desc'=>'A highly efficient slip-ring scanner for today diagnostic requirements',
            ], 

            [
                'section_id' => 'about',
                'page_title' => 'About Us',
                'page_bg_img' => '14.jpg',
                'page_desc' => '<h1>Your faithful partners Medical Goods</h1><p>Houzez allow you to design unlimited panels and real estate custom forms to capture leads and keep record of all information</p>',
            ],

            [
                'section_id' => 'shop',
                'page_title' => 'Shop',
                'page_bg_img' => '14.jpg',
                'page_desc' => '<h2>Shop With Us</h2><p>',
            ],

            [
                'section_id' => 'smart-doctor',
                'page_title' => 'Smart Doctor',
                'page_bg_img' => '14.jpg',
                'page_desc' => '<p>Find Best Medicine</p>',
            ],

            [
                'section_id' => 'search-medicine',
                'page_title' => 'Search Medicines',
                'page_bg_img' => '14.jpg',
                'page_desc' => '<p>Search Medicine By Brand or Formulae</p>',
            ],

            [
                'section_id' => 'contact',
                'page_title' => 'Contact Us',
                'page_bg_img' => '14.jpg',
                'email' => 'info@mrs.com',
                'address' => '15/A, Isamabad,Pakistan',
                'phone' => '+987-6543210',
                'page_desc' => '<p>Houzez allow you to design unlimited panels and real estate custom forms to capture leads and keep record of all information</p>',
            ],
            [
                'section_id' => 'terms-conditions',
                'page_title' => 'Terms And Conditions',
                'page_bg_img' => '14.jpg',
                'page_desc' => '<h1>Terms And Conditions</h1><p>Houzez allow you to design unlimited panels and real estate custom forms to capture leads and keep record of all information</p>',
            ],
            [
                'section_id' => 'privacy-policy',
                'page_title' => 'Privacy Policy',
                'page_bg_img' => '14.jpg',
                'page_desc' => '<p>Houzez allow you to design unlimited panels and real estate custom forms to capture leads and keep record of all information</p>',
            ],

        ];
        foreach ($cms as $key => $value) {
            CMS::create($value);
        }
    }
}
