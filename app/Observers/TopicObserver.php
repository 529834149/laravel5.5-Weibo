<?php

namespace App\Observers;

use App\Models\Topic;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored
//观察者 查看当前是否添加文章，然后在文章中获取一段信息当描述  使用观察者模式进行
class TopicObserver
{
    public function creating(Topic $topic)
    {
        //
    }

    public function updating(Topic $topic)
    {
        //
    }
    public function saving(Topic $topic)
    {
        $topic->excerpt = make_excerpt($topic->body);
    }
    
}