<?php

namespace App\Http\Controllers;

class NadiAstrologyController extends Controller
{
    public function overview()
    {
        return view('nadi-astrology');
    }

    public function show(string $slug)
    {
        $page = collect($this->pages())->firstWhere('slug', $slug);
        abort_if(!$page, 404);

        return view('nadi-astrology-detail', compact('page'));
    }

    private function pages(): array
    {
        return [
            [
                'slug' => 'history',
                'title' => 'The Sacred Origin and Legacy of Nadi Astrology',
                'subtitle' => 'Preserving 3,000 years of divine wisdom from Vaitheeswaran Koil to the modern world.',
                'sections' => [
                    ['heading' => 'Divine Beginnings', 'paragraphs' => ['The origins of Nadi Astrology trace back to a sacred discourse between Lord Shiva and Sage Agastya. Recognizing the struggles future generations would face, the holy Siddhas used their yogic vision to write individual life paths on palm leaves (Olaichuvadi).', 'These leaves were preserved as a divine gift to guide souls toward resolution and enlightenment.']],
                    ['heading' => 'Preservation Through the Ages', 'paragraphs' => ['The ancient manuscripts were carefully preserved for centuries in temple sanctuaries. A pivotal moment in history occurred under Maharajah Serfoji II of Tanjore, who gathered and organized these sacred leaves within the historic Saraswathi Mahal Library.', 'During British rule, key ancestral families acquired and safeguarded these manuscripts. These dedicated guardians became known as the traditional Nadi Families, protecting the pure wisdom across generations.']],
                    ['heading' => 'The Vaitheeswaran Koil Tradition', 'paragraphs' => ['Vaitheeswaran Koil in Tamil Nadu is globally recognized as the spiritual epicenter of Nadi Astrology. Blessed by Lord Vaidyanatha Swamy and Lord Murugan, this holy soil enhances the spiritual clarity of leaf readings.', 'Today, our center upholds this sacred legacy by delivering authentic interpretations to seekers worldwide.']],
                ],
            ],
            [
                'slug' => 'how-leaf-searching-works',
                'title' => 'How Your Personal Palm Leaf Is Found',
                'subtitle' => 'A step-by-step journey from thumb impression to your personal Olaichuvadi.',
                'sections' => [
                    ['heading' => 'Step 1: Submitting Your Thumb Impression', 'paragraphs' => ['Your journey begins with your unique thumb impression. Right thumb impressions are traditionally used for male seekers and left thumb impressions for female seekers.', 'Every thumbprint is categorized into specific pattern types, such as loops, whorls, or arches, which correspond to bundles of palm leaves preserved in our sanctuary.']],
                    ['heading' => 'Step 2: Bundle Retrieval & Verification', 'paragraphs' => ['Our expert Nadi readers retrieve the matching leaf bundles during a live in-person or online session. The reader reads statements recorded on the leaves about initials, family details, siblings, profession, or marital status.', 'You answer simply with “Yes” or “No”. No prior personal information is requested.']],
                    ['heading' => 'Step 3: Leaf Identification & Translation', 'paragraphs' => ['When every statement on a leaf matches your exact life details, your specific leaf is identified. The reader then transcribes the ancient poetic Tamil verse into modern language, explaining your past karma, present circumstances, and future path.']],
                ],
            ],
            [
                'slug' => 'the-kandams',
                'title' => 'The 14 Sacred Kandams (Chapters)',
                'subtitle' => 'Exploring every facet of your life through dedicated chapters of wisdom.',
                'table' => [
                    ['Kandam 1 (General)', 'General Life Overview', 'Name, parents, spouse, profession, and a summary of predictions across life.'],
                    ['Kandam 2', 'Wealth & Family', 'Financial growth, speech, eyes, education, and family life.'],
                    ['Kandam 3', 'Siblings', 'Brothers, sisters, relationships, and courage.'],
                    ['Kandam 4', 'Mother, Assets & House', 'Mother’s health, land, house, vehicles, and material comforts.'],
                    ['Kandam 5', 'Children & Offspring', 'Childbirth, children’s future, and reasons for delays in progeny.'],
                    ['Kandam 6', 'Health & Obstacles', 'Diseases, debts, legal troubles, enemies, and ways to overcome them.'],
                    ['Kandam 7', 'Marriage & Partnership', 'Marriage timing, spouse details, marital harmony, and partnerships.'],
                    ['Kandam 8', 'Longevity & Danger', 'Lifespan, major accidents, life risks, and protective measures.'],
                    ['Kandam 9', 'Father & Fortune', 'Father, ancestral wealth, spiritual inclination, and luck.'],
                    ['Kandam 10', 'Career & Business', 'Profession, job changes, business success, and social status.'],
                    ['Kandam 11', 'Gains & Second Marriage', 'Profits, secondary income, and potential second marriage.'],
                    ['Kandam 12', 'Expenditure & Foreign Travel', 'Expenditures, foreign travel, next birth, and spiritual liberation.'],
                    ['Shanti Kandam (13)', 'Past Life Karma & Remedies', 'Past life doshas and temple remedies to remove obstacles.'],
                    ['Diksha Kandam (14)', 'Spiritual Mantras', 'Sacred mantras and protective talismans against negative energies.'],
                ],
            ],
            [
                'slug' => 'online-prediction-process',
                'title' => 'Online Nadi Astrology Predictions',
                'subtitle' => 'Experience authentic Vaitheeswaran Koil Nadi readings from anywhere in the world.',
                'sections' => [
                    ['heading' => 'How Online Consultations Work', 'paragraphs' => ['You do not need to travel to Tamil Nadu to receive your reading. Our online process brings the complete Vaitheeswaran Koil experience directly to you.']],
                    ['heading' => 'Submit Your Impression', 'paragraphs' => ['Send a clear photo of your thumb impression via WhatsApp or our online booking form.']],
                    ['heading' => 'Schedule Your Appointment', 'paragraphs' => ['Choose a convenient date and time slot for your online video session.']],
                    ['heading' => 'Live Leaf Matching', 'paragraphs' => ['Join a private video call where our reader conducts the leaf matching process using your responses.']],
                    ['heading' => 'Full Translation & Audio Recording', 'paragraphs' => ['Once your leaf is identified, the reading is translated into your preferred language and recorded for your permanent records.']],
                ],
            ],
        ];
    }
}
