<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            ['title' => 'What Is Nadi Astrology?', 'slug' => 'what-is-nadi-astrology', 'excerpt' => 'A simple introduction to the ancient palm-leaf tradition and the careful process behind a reading.', 'content' => "Nadi Astrology is a traditional practice connected with palm-leaf manuscripts attributed to ancient sages. A reading begins with identifying and confirming the leaf connected with the seeker.\n\nThe process is approached with patience and respect. It is not a replacement for personal judgement, but a way to reflect on questions, patterns, and possible directions in life.", 'image' => 'nadi-deities.jpeg', 'published_at' => '2026-08-01'],
            ['title' => 'Why Finding the Right Leaf Takes Time', 'slug' => 'why-finding-the-right-leaf-takes-time', 'excerpt' => 'Understanding the questions, confirmations, and discipline involved in a traditional leaf search.', 'content' => "A Nadi leaf search is not a quick lookup. The reader works through a sequence of questions and confirmations to establish whether a particular manuscript belongs to the seeker.\n\nThis patient approach protects the integrity of the reading and gives the seeker space to understand each stage of the process.", 'image' => 'nadi-deities.jpeg', 'published_at' => '2026-07-24'],
            ['title' => 'Preparing for Your First Nadi Consultation', 'slug' => 'preparing-for-your-first-nadi-consultation', 'excerpt' => 'A practical guide to approaching your consultation with clear questions and an open mind.', 'content' => "Before a consultation, take time to consider the questions that matter most to you. You do not need to prepare elaborate documents; sincerity and attention are more important.\n\nDuring the reading, listen carefully and note the guidance that feels relevant to your situation. A consultation is most useful when it becomes a thoughtful starting point for your own decisions.", 'image' => 'nadi-deities.jpeg', 'published_at' => '2026-07-15'],
            ['title' => 'The Role of the Nadi Reader', 'slug' => 'the-role-of-the-nadi-reader', 'excerpt' => 'Why discipline, listening, and responsibility matter in the work of a traditional Nadi reader.', 'content' => "A Nadi reader carries more than a collection of manuscripts. The reader is responsible for protecting a process that asks for patience, careful questioning, and honest communication.\n\nThe purpose is not to create fear. It is to offer a considered reading that helps the seeker reflect with greater clarity.", 'image' => 'nadi-deities.jpeg', 'published_at' => '2026-07-08'],
            ['title' => 'Understanding the Kandams', 'slug' => 'understanding-the-kandams', 'excerpt' => 'An introduction to the different chapters traditionally explored during a Nadi reading.', 'content' => "The Kandams are chapters associated with different areas of life. Depending on the questions and the reading, they may cover areas such as family, work, health, relationships, and spiritual direction.\n\nEach chapter is approached as part of a wider story rather than as an isolated prediction.", 'image' => 'nadi-deities.jpeg', 'published_at' => '2026-06-28'],
            ['title' => 'Nadi Astrology and Personal Reflection', 'slug' => 'nadi-astrology-and-personal-reflection', 'excerpt' => 'How a traditional reading can become a meaningful space for reflection and better questions.', 'content' => "A reading can be valuable even when the most important outcome is a better question. The words from a leaf invite the seeker to pause, consider choices, and recognise what deserves attention.\n\nPersonal responsibility remains at the centre of the journey. Guidance becomes meaningful when it is met with awareness and thoughtful action.", 'image' => 'nadi-deities.jpeg', 'published_at' => '2026-06-18'],
            ['title' => 'A Quiet Approach to Spiritual Guidance', 'slug' => 'a-quiet-approach-to-spiritual-guidance', 'excerpt' => 'The value of approaching ancient guidance with calmness, respect, and an open mind.', 'content' => "Spiritual guidance does not need to be hurried. A quiet approach gives the seeker room to listen, ask questions, and decide what feels meaningful.\n\nAt Agasthiya Mahashiva Nadi Peedam, the reading is held as a respectful conversation between an old tradition and a modern seeker.", 'image' => 'nadi-deities.jpeg', 'published_at' => '2026-06-10'],
        ] as $blog) {
            Blog::updateOrCreate(['slug' => $blog['slug']], $blog + ['author' => 'Agasthiya Mahashiva Nadi Peedam', 'is_published' => true]);
        }
    }
}
