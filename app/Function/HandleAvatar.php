<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 11/15/2018
 * Time: 10:38 AM
 */

function createAvatar($request, $url)
{
    if ($request->hasFile('avatar')) {
        $img = $request->file('avatar');
        //$ext = $img->getClientOriginalExtension();
        $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
        while (file_exists($url . $urlimage . '')) {
            $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
        }
        $img->move($url, $urlimage);
        $data['avatar'] = $url .'/'. $urlimage;
        //dd($data['avatar']);
        return $data['avatar'];
    } else {
        return false;
    }
}

function updateAvatar($request, $url, $avatar)
{
    if ($request->hasFile('avatar')) {
        $img = $request->file('avatar');
        //$ext = $img->getClientOriginalExtension();
        $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
        while (file_exists($url . $urlimage)) {
            $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
        }
        $img->move($url, $urlimage);

        $data['avatar'] = $url .'/'. $urlimage;
        $str = $avatar;
        if (file_exists($str) && $avatar != null) {
            unlink($str);
        }

        return $data['avatar'];
    } else {
        return false;
    }
}

