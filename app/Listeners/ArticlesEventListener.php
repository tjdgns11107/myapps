<?php

namespace App\Listeners;

// use App\Events\article.creaeted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ArticlesEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  article.creaeted  $event
     * @return void
     */
    // public function handle(article.creaeted $event)
    // public function handle(\App\Article $article)
    public function handle(\App\Events\ArticlesEvent $event)
    {
        if ($event->action === 'created') {
            \Log::info(
                sprintf(
                    '새로운 포럼 글이 등록되었습니다.: %s',
                    $event->article->title
                )
            );
        }
        // var_dump('이벤트를 받았습니다. 받은 데이터(상태)는 다음과 같습니다.');
        // var_dump($event->article->toArray());
    }
}
