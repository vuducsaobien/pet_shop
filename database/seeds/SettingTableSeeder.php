<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->insert([
                ['key_value' => 'setting-general', 'value' => '{"logo":"\/images\/logo\/logo.png","hotline":"0362344174","working_time":"8:00-17:00","copyright":"Copyright © Pet Shop. All Right Reserved.","address":"Lê Văn Việt, Q9, HCM","introduce":"<h2>Dogs and cats and cats and dogs.<\/h2>\r\n\r\n<h3><em>We just love every little furry thing about them;&nbsp;from when they&rsquo;re tiny and helpless, as they settle&nbsp;down into our hearts and homes and daily lives, to&nbsp;when they&rsquo;re older and in need of extra care.<\/em><\/h3>","maps":"<iframe src=\"https:\/\/www.google.com\/maps\/embed?pb=!1m14!1m8!1m3!1d15671.051924420948!2d106.8504338!3d10.9056093!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd25922dd76a3040f!2zQmlnIEMgxJDhu5NuZyBOYWk!5e0!3m2!1sen!2s!4v1616783985050!5m2!1sen!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"><\/iframe>"}'],
                ['key_value' => 'setting-social', 'value' => '{"facebook":"https:\/\/www.facebook.com\/profile.php?id=100004868670715","youtube":"https:\/\/www.youtube.com\/user\/zendvn123","google":"https:\/\/www.google.com\/search?q=zenvn&rlz=1C1CHBF_enVN942VN942&oq=zenvn&aqs=chrome..69i57j46i175i199.2823j0j4&sourceid=chrome&ie=UTF-8"}'],
                ['key_value' => 'setting-email', 'value' => '{"username":"vuducsaobien95@gmail.com","password":"oichigtpl1995"}'],
                ['key_value' => 'setting-bcc', 'value' => 'leminhhung2096@gmail.com,huysdakmil1234@gmail.com'],
            ]

        );
    }
}
