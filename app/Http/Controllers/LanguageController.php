<?php
namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function setLanguage($locale)
    {
        // Kiểm tra xem locale có hợp lệ không
        if (in_array($locale, ['en', 'vi'])) {
            // Đặt ngôn ngữ cho ứng dụng
            App::setLocale($locale);

            // Lưu locale vào session
            session(['locale' => $locale]);
        }

        // Chuyển hướng về trang trước đó
        return Redirect::back();
    }
}
