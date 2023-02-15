<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CMS extends Model
{
    protected $fillable = ['section_id','logo','name','email','phone','address','facebook','twitter','instagram',
    'youtube','cta_text','cta_btn_text','cta_btn_linke','footer_about','footer_certificat','footer_payment',
    'copyright','page_title','page_desc','page_bg_img','search_widget_img','search_widget_title',
    'search_widget_desc','buy_widget_img','buy_widget_title','buy_widget_title','buy_widget_desc','buy_diagnose_img','buy_diagnose_title',
    'buy_diagnose_title','buy_diagnose_desc','free_ship_icon','free_ship_title','free_ship_desc','return_icon','return_title',
    'return_desc','secure_icon','secure_title','secure_desc','gifts_icon','gifts_title','gifts_desc','our_products_title',
    'our_products_desc','countdown_subheading','countdown_heading','countdown_desc','countdown_img','countdown_date',
    'sale_products_title','sale_products_desc','featured_products_title','featured_products_desc'];

            
}
