<?php

use App\User;
use App\Video;
use App\VideoTranslation;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    const USERS = 100;
    const VIDEOS = 15;
    const VIDEO_TRANSLATIONS = 5;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, self::USERS)->create()->each(function (User $user) {
            factory(Video::class, self::VIDEOS)->create(['user_id' => $user->id])->each(function (Video $video) {
                factory(VideoTranslation::class, self::VIDEO_TRANSLATIONS)->create(['video_id' => $video->id]);
            });
        });
//        factory(User::class, 1)->create()->each(function (User $user) {
//            $user->videos()->saveMany(
//                factory(Video::class, 1)->make()->each(function (Video $video) {
//                    $video->translations()->saveMany(
//                        factory(VideoTranslation::class, 1)->make()
//                    );
//                })
//            );
//        });
    }
}
