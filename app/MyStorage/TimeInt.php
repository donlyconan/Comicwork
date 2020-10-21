<?php

namespace App\MyStorage;

class TimeInt
{
    const SEC = 1;
    const MIN = 60;
    const HOUR = self::MIN * 60;
    const DAY = self::HOUR * 24;
    const WEAK = self::DAY * 7;
    const MONTH = self::DAY * 30;
    const YEAR = self::DAY * 365;

    private const ENUM = [self::SEC, self::MIN, self::HOUR, self::DAY, self::WEAK, self::MONTH, self::YEAR];
    private $UNIT = ['giây', 'phút', 'giờ', 'ngày', 'tuần', 'tháng', 'năm'];

    public $time = 0;
    public $timeAgo = 0;
    public $unit;

    /**
     * TimeInt constructor.
     * @param string[] $unit
     * @param int $time
     * @param $kind
     */
    public function __construct(int $time, $timeAgo, $kind)
    {
        $this->time = $time;
        $this->unit = $kind;
        $this->timeAgo = $timeAgo;
    }


    public static function create($time): TimeInt
    {
        for ($i = count(self::ENUM) - 1; $i >= 0; $i--) {
            if ($time > self::ENUM[$i]) {
                $timeAgo = self::get($time, self::ENUM[$i]);
                return new TimeInt($time ,$timeAgo, $i);
            }
        }

        return new TimeInt($time, 1, 0);
    }


    public static function get($time, $val)
    {
        $time = $time / $val;
        return $time < 1 ? 1 : round($time, 0, PHP_ROUND_HALF_DOWN);
    }

    public function convertIf(int $limit)
    {
        if ($this->time > $limit) {
            return date('h:m d/m/Y', time() - $this->time);
        } else {
            return $this->toStr();
        }
    }

    public function toStr()
    {
        return $this->timeAgo . ' ' . $this->UNIT[$this->unit] . ' trước';
    }

    public static function createToStr($time)
    {
        return self::create($time)->toStr();
    }
}
