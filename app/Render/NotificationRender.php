<?php


namespace App\Render;


use App\Model\Notification;
use App\Model\User;
use Illuminate\Support\Collection;

class NotificationRender
{
    const NOTI_REPLY = 1;
    const NOTI_COMIC_UPDATE = 2;


    public static function render(Notification $item)
    {
        $notify = (object)self::toObject($item);
        return view('include.item-notify')
            ->with(compact('notify'))->render();
    }

    public static function toObject(Notification $item)
    {
        $json = $item->content();

        switch ($json->action) {
            case self::NOTI_REPLY:
                $content = "<strong>{$item->userLink()->full_name}</strong>
                    vừa trả lời bình luận của bạn.";
                $time = $item->toTime();
                $url = route('comic.info', $json->id_comic);
                $seen = $item->status == 1;

                return compact('content', 'url', 'seen', 'time');

            case self::NOTI_COMIC_UPDATE:
                $content = "Truyện <strong>{$item->comicLink()->name}</strong>
                        đã cập nhật chương {$json->chapter}.";
                $time = $item->toTime();
                $url = route('comic.chapter', ['id' => $json->id_comic,
                    'chapter' => $json->id_chapter]);
                $seen = $item->status == 1;


                return compact('content', 'seen', 'url', 'time');
        }
    }

    public static function toObjectCollection($listNotify): Collection
    {
        $notifies = new Collection();

        foreach ($listNotify as $item) {
            $obj = (object)self::toObject($item);
            $notifies->add($obj);
        }
        return $notifies;
    }

    public static function share()
    {
        if (\Auth::check()) {
            $data = Notification::where('id_user', \Auth::id())
                ->get()->sortByDesc('updated_at')
                ->skip(0)->take(15);
            $notifies = NotificationRender::toObjectCollection($data);

            $notifies->total = Notification::where('id_user', \Auth::id())
                ->where('status', 0)
                ->count();
            return $notifies;
        }
    }

}
