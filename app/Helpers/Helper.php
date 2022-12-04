<?php

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Plugins\MenuBuilder\Page;
use App\Models\Plugins\Credits\UserPoint;
use App\Models\Plugins\Credits\PointSettings;
use App\Models\Plugins\Credits\PointTransaction;
use App\Models\Authorization\AuthorizationPermission;
use App\Http\Controllers\Authorization\AuthorizationChecker;

if (!function_exists('BdDate')) {
    function BdDate($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }
}
if (!function_exists('imagePath')) {
    function imagePath($folder, $image)
    {
        $path = 'uploads/images/'.$folder.'/'.$image;
        if(@GetImageSize($path)){
            return asset($path);
        }else{
            return setting('app_logo');
        }
    }
}

if (!function_exists('transaction_id')) {
    function transaction_id($src = '', $length = 12)
    {
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($length / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($length / 2));
        } else {
            throw new \Exception("no cryptographically secure random function available");
        }
        if ($src != '') {
            return strtoupper($src.'_'.substr(bin2hex($bytes), 0, $length));
        }
        return strtoupper(substr(bin2hex($bytes), 0, $length));
    }
}
if (!function_exists('activeSubNav')) {
    function activeSubNav($route)
    {
        if (is_array($route)) {
            $rt = '';
            foreach ($route as $rut) {
                $rt .= request()->routeIs($rut) || '';
            }
            return $rt ? ' activeSub ' : '';
        }
        return request()->routeIs($route) ? ' activeSub ' : '';
    }
}

if (!function_exists('activeNav')) {
    function activeNav($route)
    {
        if (is_array($route)) {
            $rt = '';
            foreach ($route as $rut) {
                $rt .= request()->routeIs($rut) || '';
            }
            return $rt ? ' active ' : '';
        }
        return request()->routeIs($route) ? ' active ' : '';
    }
}

if (!function_exists('openNav')) {
    function openNav(array $routes)
    {
        $rt = '';
        foreach ($routes as $route) {
            $rt .= request()->routeIs($route) || '';
        }
        return $rt ? ' show ' : '';
    }
}
if (!function_exists('userCan')) {
    function userCan($permission)
    {
        if (auth()->check() && user()->can($permission)) {
            return true;
        }
        return false;
    }
}

if (!function_exists('roleName')) {
    function roleName($roles)
    {
        $r = '';
        foreach ($roles->where('name', '!=', 'client') as $role) {
            $r .= '<span class="badge badge-info">' . ucfirst(explode('@uid', $role->name)[0]) . '</span>';
        }
        return $r;
    }
}
if (!function_exists('trimRoleAdmin')) {
    function trimRoleAdmin($roles)
    {
        return str_replace('-', ' ', $roles);
    }
}
if (!function_exists('trimRole')) {
    function trimRole($val)
    {
        return str_replace('-', ' ', explode('@uid', $val)[0]);
    }
}


if (!function_exists('uniqueId')) {
    function uniqueId($lenght = 8)
    {
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new \Exception("no cryptographically secure random function available");
        }
        return substr(bin2hex($bytes), 0, $lenght);
    }
}
if (!function_exists('propic')) {
    function propic($user)
    {
        return $user->profile_picture ? asset($user->profile_picture) : asset('assist/images/avatar.png');
    }
}
if (!function_exists('user')) {
    function user()
    {
        return auth()->user();
    }
}

if (!function_exists('slug')) {
    function slug($slug)
    {
        return Str::slug($slug);
    }
}

if (!function_exists('word_limit')) {
    function word_limit(string $string, int $limit = 8)
    {
        return Str::words(strip_tags($string), $limit);
    }
}

if (!function_exists('userHasPrivilege')) {
    function userHasPrivilege(array $permission)
    {
        if (AuthorizationChecker::canDo($permission)) {
            return true;
        }
        return false;
    }
}

if (!function_exists('bn_slug')) {
    function bn_slug($text)
    {
        $array = [':', ',', '.', '!', '|', '।', 'ঃ', '{', '}', '[', ']', '(', ')', '৳', '%', '$', '#', '@', '*', '+', ';'];
        $slug = strtolower(str_replace($array, '', trim($text)));
        return str_replace(' ', '-', $slug);
        return strtolower(preg_replace('/\s+/u', '-', trim($text)));
    }
}

if (!function_exists('make_slug')) {
    function make_slug($string)
    {
        $slug = preg_replace('/\s+/u', '-', trim($string));
        $slug = str_replace("/", "", $slug);
        $slug = str_replace("?", "", $slug);
        return mb_strtolower($slug, 'UTF-8');
    }
}

if (!function_exists('niceNumber')) {
    function niceNumber($n)
    {
        // first strip any formatting;
        $n = (0 + str_replace(",", "", $n));

        // is this a number?
        if (!is_numeric($n)) {
            return $n;
        }

        // now filter it;
        if ($n >= 1000000000000) {
            return round(($n / 1000000000000), 1) . ' T';
        } elseif ($n >= 1000000000) {
            return round(($n / 1000000000), 1) . ' B';
        } elseif ($n >= 1000000) {
            return round(($n / 1000000), 1) . ' M';
        } elseif ($n >= 1000) {
            return round(($n / 1000), 1) . ' K';
        }

        return number_format($n);
    }
}

if (!function_exists('niceFileSize')) {
    function niceFileSize($bytes)
    {
        $result = '';
        $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

        foreach ($arBytes as $arItem) {
            if ($bytes >= $arItem["VALUE"]) {
                $result = $bytes / $arItem["VALUE"];
                $result = strval(round($result, 2)) . " " . $arItem["UNIT"];
                break;
            }
        }
        return $result;
    }
}


