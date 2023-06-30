<?php
namespace App\Helpers;

class Helper
{
    public static function active($active = 0): string {
        return $active == 0 ? '<span class="badge bg-danger">Đang ẩn</span>'
            : '<span class="badge bg-success">Hiển thị </span>';
    }
}
