<?php

use App\Models\UsersModel;

/**
 * Get id of currently logged user
 * 
 * @return int
 */
function user_id()
{
	return session()->get("userid") ?? null;
}

/**
 * Get details of currently logged user
 * 
 * @param string $key
 * @param int $idUser
 * 
 * @return mixed
 */
function user_detail($key = "", $idUser = null)
{
	static $cached_user = null;
	$idUser = $idUser ?? session()->get("userid");

	if ($idUser === null) return null;

	if ($cached_user === null || $cached_user->id != $idUser) {
		$users = new UsersModel();
		$cached_user = $users->where("id", $idUser)->first();
	}

	if (!$cached_user) return null;

	return trim($key) ? ($cached_user->{$key} ?? null) : $cached_user;
}

/**
 * Get user avatar link
 * 
 * @param string $avatar
 * 
 * @return string
 */
function avatar($avatar = null, $userdata = null)
{
	$avatar = trim($avatar) ?? null;
	if ($avatar == null) {
		$avatar = $userdata->avatar;
	}

	if (filter_var($avatar, FILTER_VALIDATE_URL)) return $avatar;

	$path = "./uploads/avatars/" . $avatar;

	return ($avatar && !file_exists($path)) ?
		base_url("app/img/avatars/franklin.png") :
		base_url("uploads/avatars/" . $avatar);
}
