<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cms;
class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cms::create([
            'title' => 'about_us',
            'description' => 'Infusion Analysts is a Technology/Data driven Web and Software Development Company. We as Infusion Analysts is one of the colonist software solution partners working with Assured Reliability. Infusion Analysts is an offshore Company having expertise in Enterprise Solutions, Web Development, Mobile Development, UI/UX Design Technologies having headquarters at India. Infusion Analysts is established with aim of providing smarter digital solutions to business by a group of young technocrats.We have expertise in developing Enterprise Solutions, Web Development, Mobile Development, UI/UX Design Technologies etc. We provide services to Startups, Small, Medium and Large Scale Enterprises. We have team of 40+ Developers having expertise in different technologies. We have served our services across the Globe and have delivered 92+ Projects successfully. We provide Solutions to the clients at reasonable price.We are Committed to Client amuse, which we accomplished through uncommon administration and superb nature of work.The stamp of our Unwavering quality is reflected in every method we pursue and in the outputs we deliver. Our Clients have been able to implement their ideas into reality with help of our consultants bringing IT and their business in sync. With help of our IT solutions, we help our clients to implement their strategies and achieve more.',
            'status' => 'active',
        ]);
    }
}
