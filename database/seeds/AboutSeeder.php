<?php

use Illuminate\Database\Seeder;
use App\About;
class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'banner' => 'about.jpg',
            'about' => 'Kejarbahasa adalah sebuah media yang menyediakan tutorial, informasi yang berkaitan dengan teknologi dan informasi seperti pemograman web, mobile. Topik yang kami cakup lumayan bervariasi dari PHP, Javascript, java maupun kotlin adapun keperluan kantor seperti word, power point dan exel selain menyidiakan module/artikel tutorial gratis. Kami juga menyediakan modul premium. untuk teman teman yang membutuhkan materi yang lebih terstuktur dan komprensif serta bimbingan selama belajar.Untuk teman-teman yang sempat mampir pada website kami. Jika merasa apa yang ada di dalam website kami bermanfaat, bantu kami menyebarluaskan manfaat ini. Kedepannya dengan dukungan teman-teman semua, module yang ada di kejarbahasa akan semakin lengkap, yang gratis maupun premium.'
        ]);
    }
}
