<?php

namespace App\Helpers;

use App\Models\{Setting};
use Illuminate\Database\Eloquent\Model;


class Helper
{
    public static function uploadFile($file, $dir = 'uploads')
    {
        return \Storage::disk('public')->putFile($dir, $file);
    }

    public static function deleteFile($img, $dir = 'uploads')
    {
        \Storage::disk('public')->delete($dir, $img);
        return true;
    }

    public static function getFile($file)
    {
        if (is_null($file)) {
            return url('/default.png');
        }
        return url('/') . '/storage/' . $file;
    }

    /**
     * get setting value by name
     *
     * @param string $key
     * @return Model
     */
    public static function getSettingValue($key): Model
    {
        return Setting::where('name', $key)->first();
    }

    public static function getSettings(): array
    {
        $data = [];

        $settings = Setting::get(['id', 'name', 'value']);

        $data['about'] = self::getSettingLang($settings->where('name', 'about')->first());
        $data['terms'] = self::getSettingLang($settings->where('name', 'terms')->first());
        $data['app_commission'] = self::getSettingLang($settings->where('name', 'app_commission')->first());
        $data['phone'] = self::getSettingLang($settings->where('name', 'phone')->first());
        $data['whatsapp'] = self::getSettingLang($settings->where('name', 'whatsapp')->first());
        $data['facebook'] = self::getSettingLang($settings->where('name', 'facebook')->first());
        return $data;
    }

    public static function getSettingLang(mixed $data): string
    {

        return $data['value'] ?? $data['value']['ar'] ?? '';
    }

    public static function is_active(): array
    {
        return [
            '0' => 'غير مفعل',
            '1' => 'مفعل',
        ];
    }

    public static function getLocaleFromJson(array $data): array
    {
        $res = [];
        if (isset($data['title'], $data['en_title'])) {
            $res['title'] = self::getLang($data, 'title');
        }

        if (isset($data['body'], $data['en_body'])) {
            $res['body'] = self::getLang($data, 'body');
        }

        return $res;
    }

    public static function getLang(array $data, $key): string
    {
        if (isset($data[$key])) {
            return app()->getLocale() == 'ar' ? $data[$key] : $data['en' . $key];
        }
        return '';
    }

    public static function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        return ($miles * 1.609344);
    }
}
