<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        $posts = [
            ['title' => 'La sirenita es buena para los niños', 'content' => 'Muy buena película, le gusto mucho a mi hija pequeña.', 'author_id' => '5', 'photo' => 'sirenita.jpg', 'created_at' => now()],
            ['title' => 'El club de la pelea: Una crítica a la sociedad consumista', 'content' => 'Fight Club es una exploración audaz de la masculinidad y el consumismo. La dirección de David Fincher y la actuación de Edward Norton son impresionantes.', 'author_id' => '7', 'photo' => 'fightclub.jpg', 'created_at' => now()],
            ['title' => 'Rapidos y furiosos 24 no cumplió con las expectativas', 'content' => 'Vin Diesel no debió sobrevivir en el espacio, una pérdida de tiempo.', 'author_id' => '3', 'photo' => 'rapidos.jpg', 'created_at' => now()],
            ['title' => 'La La Land: Una obra maestra del jazz moderno', 'content' => 'La La Land es una película brillante que combina música, emoción y una hermosa historia de amor. Los números musicales están impecablemente coreografiados y las actuaciones de Emma Stone y Ryan Gosling son inolvidables. Definitivamente, una obra maestra para los amantes del jazz y del cine.', 'author_id' => '7', 'photo' => 'lalaland.jpg', 'created_at' => now()],
            ['title' => 'Cats es lo peor que he visto', 'content' => 'Me considero fan de los musicales, y hasta de los más malos, sin embargo Cats es un desastre total. La mezcla de animación y actores en trajes resulta incómoda, y la historia es confusa y sin sentido.', 'author_id' => '12', 'photo' => 'cats.jpg', 'created_at' => now()],
            ['title' => 'El viaje de Chihiro: Un viaje mágico', 'content' => 'El viaje de Chihiro es una obra maestra de la animación. La historia es rica y emocional, y la animación de Studio Ghibli es simplemente deslumbrante.', 'author_id' => '7', 'photo' => 'chihiro.jpg', 'created_at' => now()],
            ['title' => 'Toy Story y el comienzo de la animación moderna', 'content' => 'Toy Story es una película conmovedora que captura la magia de la infancia. La animación es brillante y los personajes son entrañables.', 'author_id' => '22', 'photo' => 'toystory.png', 'created_at' => now()],
            ['title' => 'Batman: El caballero oscuro: El renacer de un héroe', 'content' => 'Para mí Batman: El caballero oscuro es un hito en el cine de superhéroes. La actuación de Heath Ledger como el Joker es aterradora y magistral, elevando la película a otro nivel.', 'author_id' => '7', 'photo' => 'batman.jpg', 'created_at' => now()],
            ['title' => 'Interestelar me arruinó la vida', 'content' => 'Lloré mucho no la vean', 'author_id' => '3', 'photo' => 'estelar.jpeg', 'created_at' => now()],
            ['title' => 'El live action de Avar es horrible', 'content' => 'Avatar: La leyenda de Aang es una adaptación que no hace justicia a la serie animada. Malas actuaciones y una dirección pobre hacen que sea difícil de ver. Netflix para la otra mejor no hagas nada.', 'author_id' => '8', 'photo' => 'aang.jpeg', 'created_at' => now()],
            ['title' => 'Me gustó Jurassic Park', 'content' => '¿Han visto esta película? Jurassic Park es una aventura emocionante que combina acción y efectos especiales innovadores. La idea de revivir dinosaurios sigue siendo fascinante.', 'author_id' => '36', 'photo' => 'park.png', 'created_at' => now()],
            ['title' => 'MULÁN LIVE ACTION', 'content' => '¿¡DONDE ESTA MUSHUUU?!!!', 'author_id' => '3', 'photo' => 'mulan.jpg', 'created_at' => now()],
        ];  

        DB::table('posts')->insert($posts);
    }
}
