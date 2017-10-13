<?php

use Illuminate\Database\Seeder;
use App\Movie;

class MovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movie = new Movie();
        $movie->title = 'The Foreigner';
        $movie->body = 'A humble businessman with a buried past seeks justice when his daughter is killed in an act of terrorism. A cat-and-mouse conflict ensues with a government official, whose past may hold clues to the killers identities.';
        $movie->year = '2017';
        $movie->genre = 'Action';
        $movie->image_url = 'https://images-na.ssl-images-amazon.com/images/M/MV5BM2RlMjcyMGQtZTU3OC00NGRlLWExMGEtYjU3ZjUyMDc0NWZmXkEyXkFqcGdeQXVyNTI4MzE4MDU@._V1_SY1000_SX675_AL_.jpg';
        $movie->save();



        $movie = new Movie();
        $movie->title = 'The Shawshank Redemption';
        $movie->body = 'Chronicles the experiences of a formerly successful banker as a prisoner in the gloomy jailhouse of Shawshank after being found guilty of a crime he did not commit. The film portrays the man"s unique way of dealing with his new, torturous life; along the way he befriends a number of fellow prisoners, most notably a wise long-term inmate named Red.';
        $movie->year = '1994';
        $movie->genre = 'Crime';
        $movie->image_url = 'https://images-na.ssl-images-amazon.com/images/M/MV5BODU4MjU4NjIwNl5BMl5BanBnXkFtZTgwMDU2MjEyMDE@._V1_SY1000_CR0,0,672,1000_AL_.jpg';
        $movie->save();


        $movie = new Movie();
        $movie->title = 'Batman Begins';
        $movie->body = 'When his parents are killed, billionaire playboy Bruce Wayne relocates to Asia where he is mentored by Henri Ducard and Ra"s Al Ghul in how to fight evil. When learning about the plan to wipe out evil in Gotham City by Ducard, Bruce prevents this plan from getting any further and heads back to his home. Back in his original surroundings, Bruce adopts the image of a bat to strike fear into the criminals and the corrupt as the icon known as "Batman". But it doesn"t stay quiet for long.';
        $movie->year = '2005';
        $movie->genre = 'Action';
        $movie->image_url = 'https://images-na.ssl-images-amazon.com/images/M/MV5BNTM3OTc0MzM2OV5BMl5BanBnXkFtZTYwNzUwMTI3._V1_.jpg';
        $movie->save();


        $movie = new Movie();
        $movie->title = 'Interstellar';
        $movie->body = 'Earth"s future has been riddled by disasters, famines, and droughts. There is only one way to ensure mankind"s survival: Interstellar travel. A newly discovered wormhole in the far reaches of our solar system allows a team of astronauts to go where no man has gone before, a planet that may have the right environment to sustain human life.';
        $movie->year = '2014';
        $movie->genre = 'Adventure';
        $movie->image_url = 'https://images-na.ssl-images-amazon.com/images/M/MV5BMjIxNTU4MzY4MF5BMl5BanBnXkFtZTgwMzM4ODI3MjE@._V1_SY1000_CR0,0,640,1000_AL_.jpg';
        $movie->save();
    }
}
