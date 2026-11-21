<?php

namespace Database\Seeders;

use App\Models\NewsEvent;
use Illuminate\Database\Seeder;

class NewsEventSeeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            ['title' => 'Annual Agastya Peedam Puja', 'slug' => 'annual-agastya-peedam-puja', 'excerpt' => 'A look at the devotional observance and daily practices held at the Peedam.', 'content' => "The Peedam continues its daily puja and devotional practices throughout the year. These observances keep the spiritual discipline of the tradition at the heart of the ashram.\n\nVisitors and seekers are welcome to approach the Peedam with respect and a quiet mind.", 'image' => 'nadi-deities.jpeg', 'event_date' => '2026-08-15', 'published_at' => '2026-08-05'],
            ['title' => 'New Online Consultation Schedule', 'slug' => 'new-online-consultation-schedule', 'excerpt' => 'Our updated online consultation schedule makes it easier for seekers outside India to connect.', 'content' => "Online consultations are now being arranged across more time zones for seekers living outside India. Please contact the team before booking so we can guide you through the preparation and available timings.", 'image' => 'home-banner.jpeg', 'event_date' => '2026-08-20', 'published_at' => '2026-08-02'],
            ['title' => 'Vaitheeswaran Koil: A Sacred Place of Practice', 'slug' => 'vaitheeswaran-koil-a-sacred-place-of-practice', 'excerpt' => 'Discover the temple town and the living spiritual atmosphere connected with Nadi tradition.', 'content' => "Vaitheeswaran Koil has long been associated with healing, devotion, and Nadi Astrology. The town's temples, streets, and daily rituals form part of the atmosphere in which this tradition continues to be practised.", 'image' => 'nadi-deities.jpeg', 'event_date' => '2026-07-28', 'published_at' => '2026-07-28'],
            ['title' => 'Peedam Observance During Festival Days', 'slug' => 'peedam-observance-during-festival-days', 'excerpt' => 'Important information about consultation availability during major Hindu festival days.', 'content' => "The Peedam may be closed to visitors or operate with limited consultation hours during major festival observances. Please contact our team in advance to confirm availability before planning your visit.", 'image' => 'nadi-deities.jpeg', 'event_date' => '2026-07-20', 'published_at' => '2026-07-20'],
            ['title' => 'Serving Seekers Across the World', 'slug' => 'serving-seekers-across-the-world', 'excerpt' => 'How traditional Nadi guidance is being shared with seekers from different countries.', 'content' => "With translation support and online consultations, the Peedam continues to receive seekers from many parts of the world. The central process remains rooted in the same patience and care.", 'image' => 'home-banner.jpeg', 'event_date' => '2026-07-10', 'published_at' => '2026-07-10'],
            ['title' => 'A Note on Responsible Spiritual Guidance', 'slug' => 'a-note-on-responsible-spiritual-guidance', 'excerpt' => 'Our commitment to respectful, honest, and responsible communication during every consultation.', 'content' => "Spiritual guidance should never be used to create fear or remove a person's responsibility for their own choices. Our consultations are intended to support reflection, clarity, and thoughtful action.", 'image' => 'nadi-deities.jpeg', 'event_date' => '2026-06-30', 'published_at' => '2026-06-30'],
        ] as $item) {
            NewsEvent::updateOrCreate(['slug' => $item['slug']], $item + ['is_published' => true]);
        }
    }
}
