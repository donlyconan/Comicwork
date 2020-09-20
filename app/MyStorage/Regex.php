<?php
namespace App\MyStorage;


class Regex
{
    /*
     *Là số hoặc chữ chứa từ 6-100 ký tự
     * và có thể chưa các ký tự đặc biệt
     */
    public static function getRegexPassword()
    {
        return "(([\w\d@.$~!&*()^#%]+){6,100})";
    }

    /*
     * Là số hoặc chữ
     * chứ từ 5-100 ký tự
     */
    public static function getRegexUsername()
    {
        return "(([\w\d]+){5,100})";
    }


    /*
     *Phải là chữ có thể có dấu cách
     * và phải có từ 1-40 ký tự
     */
    public static function geRegexFirstname()
    {
        return '((((\w+)+( )?)+){1,40})';
    }

    /*
     *Phải là chữ có thể có dấu cách
     * và phải có từ 1-40 ký tự
     */
    public static function getRegexLastname()
    {
        return '((((\w+)+( )?)+){1,40})';
    }

    /*
     *Là chữ và phải có dấu cách
     * VD: Pham Thanh
     * Va có ít nhất 5 đến 60 ký tự
     */
    public static function getRegexFullname()
    {
        return '((\w+( ))(\w+){5,60})';
    }


    /*
     * Bắt đầu phải là 0 hoặc 84
     * Kết thúc phải là 1 chuỗi số
     * Có độ dài từ 8-20
     */
    public static function getRegexPhoneNumber()
    {
        return '(0(\d+){8,20})';
    }


    /*
     * Là các file có phần mở rộng là hình ảnh
     */
    public static function getExtentionImage()
    {
        return 'jpg,gif,png,jpge';
    }

    const EXT_IMAGE = ['.jpg', '.gif', '.png', '.jpge'];

    /*
     * Kiểm tra tên file có phải là định dạng image hay không
     */
    public static function isImage($filename)
    {
        foreach (EXT_IMAGE as $ext) {
            if ($filename->endsWith($ext)) {
                return true;
            }
        }
        return false;
    }


}

?>
