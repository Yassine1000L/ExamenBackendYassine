<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\News;
use App\Models\Faq;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Admin gebruiker
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@ehb.be',
            'password' => password_hash('Password!321', PASSWORD_DEFAULT),
            'username' => 'admin',
            'is_admin' => true,
        ]);

        // Gewone gebruiker
        User::create([
            'name' => 'Gebruiker',
            'email' => 'gebruiker@example.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'is_admin' => false,
        ]);

        // Tags
        $tag1 = Tag::create(['name' => 'Transfer']);
        $tag2 = Tag::create(['name' => 'Wedstrijd']);
        $tag3 = Tag::create(['name' => 'Jeugd']);

        // Nieuwsartikelen
        $news1 = News::create([
            'title' => 'Nieuwe speler aangetrokken',
            'content' => 'FC Erasmus heeft een nieuwe spits aangetrokken voor het komende seizoen.',
            'published_at' => date('Y-m-d H:i:s'),
            'user_id' => $admin->id,
        ]);

        $news2 = News::create([
            'title' => 'Jeugdtoernooi gewonnen',
            'content' => 'Onze U17 ploeg heeft het jaarlijkse jeugdtoernooi gewonnen.',
            'published_at' => date('Y-m-d H:i:s'),
            'user_id' => $admin->id,
        ]);

        // Tags koppelen aan nieuws (many-to-many)
        $news1->tags()->attach([$tag1->id, $tag2->id]);
        $news2->tags()->attach([$tag2->id, $tag3->id]);

        // FAQs
        Faq::create([
            'question' => 'Hoe laat is de training?',
            'answer' => 'De training is elke dinsdag en donderdag om 18u.',
            'category' => 'Training',
            'user_id' => $admin->id,
        ]);

        Faq::create([
            'question' => 'Wat kost het lidmaatschap?',
            'answer' => 'Het lidmaatschap kost €50 per jaar.',
            'category' => 'Algemeen',
            'user_id' => $admin->id,
        ]);

        Faq::create([
            'question' => 'Waar ligt het terrein?',
            'answer' => 'Het terrein ligt aan de Sportlaan 12.',
            'category' => 'Algemeen',
            'user_id' => $admin->id,
        ]);
    }
}
