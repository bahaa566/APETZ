<?php

namespace Database\Seeders;

use App\Models\Admin;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('settings')->delete();

        \DB::table('settings')->insert([

            [
                'id' => 1,
                'name' => 'terms',
                'type' => 'translatable_textarea',
                'value' => '{"ar":"الشروط والاحكام الخاصة بتطبيق شيال","en":"Terms & Conditions of use Shayal Application"}',
                'page' => 'النصوص',
                'slug' => 'text',
                'title' => 'الشروط و الاحكام',
                'created_at' => NULL,
                'updated_at' => '2022-03-30 12:27:58',
            ],
            [
                'id' => 2,
                'name' => 'about',
                'type' => 'translatable_textarea',
                'value' => '{"ar":"عن تطبيق شيال","en":"About Shayal Application"}',
                'page' => 'النصوص',
                'slug' => 'text',
                'title' => 'عن التطبيق',
                'created_at' => NULL,
                'updated_at' => '2022-03-30 12:27:58',
            ],
            [
                'id' => 3,
                'name' => 'facebook',
                'type' => 'url',
                'value' => '{"ar":"https:\\/\\/xd.adobe.com\\/view\\/1c12e17b-e752-4087-9a84-0a6baa1de32f-4941\\/screen\\/5fe8b32e-17bd-4ec8-8c5b-a0027efe5fb8\\/","en":"https:\\/\\/xd.adobe.com\\/view\\/1c12e17b-e752-4087-9a84-0a6baa1de32f-4941\\/screen\\/5fe8b32e-17bd-4ec8-8c5b-a0027efe5fb8\\/"}',
                'page' => 'روابط التواصل',
                'slug' => 'socials',
                'title' => 'رابط الفيس بوك',
                'created_at' => NULL,
                'updated_at' => '2022-03-26 14:11:20',
            ],
            [
                'id' => 4,
                'name' => 'whatsapp',
                'type' => 'number',
                'value' => '{"ar":"0096610002000","en":"0096610002000"}',
                'page' => 'روابط التواصل',
                'slug' => 'socials',
                'title' => 'رقم واتساب',
                'created_at' => NULL,
                'updated_at' => '2022-03-30 12:28:26',
            ],
            [
                'id' => 5,
                'name' => 'phone',
                'type' => 'number',
                'value' => '{"ar":"0096610001000","en":"0096610001000"}',
                'page' => 'روابط التواصل',
                'slug' => 'socials',
                'title' => 'رقم الجوال',
                'created_at' => NULL,
                'updated_at' => '2022-03-30 12:28:26',
            ],
            [
                'id' => 6,
                'name' => 'splash_text_1',
                'type' => 'translatable_text',
                'value' => '{"ar":"نص البداية الاول","en":"First text"}',
                'page' => 'النصوص',
                'slug' => 'text',
                'title' => 'نص البداية الاول',
                'created_at' => NULL,
                'updated_at' => '2022-03-30 12:27:58',
            ],
            [
                'id' => 7,
                'name' => 'splash_text_2',
                'type' => 'translatable_text',
                'value' => '{"ar":"نص البداية الثاني","en":"Second Text"}',
                'page' => 'النصوص',
                'slug' => 'text',
                'title' => 'نص البداية الثاني',
                'created_at' => NULL,
                'updated_at' => '2022-03-30 12:27:58',
            ],
            [
                'id' => 8,
                'name' => 'splash_text_3',
                'type' => 'translatable_text',
                'value' => '{"ar":"نص البداية الثالث","en":"Third Text"}',
                'page' => 'النصوص',
                'slug' => 'text',
                'title' => 'نص البداية الثالث',
                'created_at' => NULL,
                'updated_at' => '2022-03-30 12:27:58',
            ],
            [
                'id' => 9,
                'name' => 'app_commission',
                'type' => 'number',
                'value' => '{"ar":"10"}',
                'page' => 'الماليات',
                'slug' => 'finance',
                'title' => 'عمولة التطبيق',
                'created_at' => NULL,
                'updated_at' => '2022-03-30 12:28:04',
            ],
        ]);
    }
}
