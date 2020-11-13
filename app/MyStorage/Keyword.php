<?php


namespace App\MyStorage;


class Keyword
{
    public const COE = 0.5;

    public $keyword;

    function __construct($keyword)
    {
        $this->keyword = $keyword;
    }

    public function clearUnicode($word)
    {
        return str_replace('^[\w\d\s]', '', strtolower($word));
    }


    /*
     * Tính toán số điểm dựa trên từ khoá với ký tự được truyền vào
     * 1. So sánh về giá trị ngang hàng
     * 2. So sánh về thứ tự và số giá trị trùng khớp
     *      Điểm được tính dựa trên số ký tự trùng khớp/tổng số ký tự
     *      Uư tiên các cụm ký tự, điểm cộng sẽ được tăng liên tục dựa các cụm ký tự
     *      Độ tin cậy của kết quả:
     *          R = c * score * n/(d * k) <= 9.5
     *      + score : số điểm đạt được
     *      + k: số ký tự của từ khoá
     *      + d: số ký tự đầu vào
     *      + c: hằng số (=5)
     */
    public function calculate($word)
    {
        $keyword = strtolower($this->keyword);
        $word = strtolower($word);

        if ($keyword == $word or
            $this->clearUnicode($keyword) == $word) {
            return 10;
        } else if (str_contains($word, $keyword)) {
            return 10 * strlen($keyword) / strlen($word);
        } else {
            if (strlen($keyword) == 0) {
                return 0;
            }
            // là số ký tự trùng khớp
            $score = 0;
            // là ký tự thứ i của keyword được so sánh
            $i = 0;
            // là số điểm cộng thêm cho mỗi ký tự trùng khớp
            $bonus = 1;
            $n = 0;

            for ($j = 0; $j < strlen($word) and $i < strlen($keyword); $j++) {
                $ch = $keyword[$i];
                while ($i < strlen($keyword) - 1 and $this->next($ch, $j, $word) == -1) {
                    $ch = $keyword[$i + 1];
                    $i++;
                }

                if ($word[$j] == $ch) {
                    $score += $bonus;
                    $bonus += 0.1;
                    $n++;
                    $i++;
                } else {
                    $bonus = 1;
                }
            }
            $d = strlen($word);
            $k = strlen($keyword);
            $c = 5;

            $r = $c * $score / $d * min(pow($n / $k, 2), 1);
//            print "d=$d  k=$k n=$n r=$r score=$score";

            return min($r, 9.5);
        }
    }


    public function next($ch, $j, $word)
    {
        for ($k = $j; $k < strlen($word); $k++) {
            if ($ch == $word[$k]) {
                return $k;
            }
        }
        return -1;
    }

}
