<?php

use CodeIgniter\I18n\Time;
use Hashids\Hashids;

/**
 * Convert Array to stdClass (Object)
 * 
 * @param array $array
 * 
 * @return object
 */
function array2object($array)
{
	return json_decode(json_encode($array), FALSE);
}

/**
 * Get IP Info
 * 
 * @param mixed $ip
 * @param string $purpose
 * @param bool $deep_detect
 * 
 * @return mixed
 */
function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE)
{
	$output = NULL;
	if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
		$ip = $_SERVER["REMOTE_ADDR"];
		if ($deep_detect) {
			if (filter_var(@$_SERVER["HTTP_X_FORWARDED_FOR"], FILTER_VALIDATE_IP))
				$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
			if (filter_var(@$_SERVER["HTTP_CLIENT_IP"], FILTER_VALIDATE_IP))
				$ip = $_SERVER["HTTP_CLIENT_IP"];
		}
	}
	$purpose    = str_replace(
		array("name", "\n", "\t", " ", "-", "_"),
		"",
		strtolower(trim($purpose))
	);
	$support    = array("country", "countrycode", "state", "region", "city", "location", "address");
	$continents = array(
		"AF" => "Africa",
		"AN" => "Antarctica",
		"AS" => "Asia",
		"EU" => "Europe",
		"OC" => "Australia (Oceania)",
		"NA" => "North America",
		"SA" => "South America"
	);
	if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
		$url = "http://www.geoplugin.net/json.gp?ip=" . $ip;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3); // 3 seconds timeout
		curl_setopt($ch, CURLOPT_TIMEOUT, 5); // 5 seconds total
		$data = curl_exec($ch);
		curl_close($ch);

		$ipdat = @json_decode($data);
		if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
			switch ($purpose) {
				case "location":
					$output = array(
						"city"           => @$ipdat->geoplugin_city,
						"state"          => @$ipdat->geoplugin_regionName,
						"country"        => @$ipdat->geoplugin_countryName,
						"country_code"   => @$ipdat->geoplugin_countryCode,
						"continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
						"continent_code" => @$ipdat->geoplugin_continentCode
					);
					break;
				case "address":
					$address = array($ipdat->geoplugin_countryName);
					if (@strlen($ipdat->geoplugin_regionName) >= 1)
						$address[] = $ipdat->geoplugin_regionName;
					if (@strlen($ipdat->geoplugin_city) >= 1)
						$address[] = $ipdat->geoplugin_city;
					$output = implode(", ", array_reverse($address));
					break;
				case "city":
					$output = @$ipdat->geoplugin_city;
					break;
				case "state":
					$output = @$ipdat->geoplugin_regionName;
					break;
				case "region":
					$output = @$ipdat->geoplugin_regionName;
					break;
				case "country":
					$output = @$ipdat->geoplugin_countryName;
					break;
				case "countrycode":
					$output = @$ipdat->geoplugin_countryCode;
					break;
			}
		}
	}
	return $output;
}

/**
 * Convert to Indonesian date format
 * 
 * @param string $date
 * @param bool $time
 * 
 * @return string
 */
function indonesia_date($date, $time = false)
{
	$timestamp = strtotime($date);
	$dt = Time::createFromTimestamp($timestamp, null, "id_ID");
	$dt = $dt->setTimezone("Asia/Jakarta");

	if ($time === true) {
		return $dt->toLocalizedString("EEEE, dd MMMM Y HH:mm:ss");
	}
	return $dt->toLocalizedString("EEEE, dd MMMM Y");
}

/**
 * Convert title into slug
 * 
 * @param string $text
 * @param string $divider
 * 
 * @return string
 */
function slugify($text, $divider = "-")
{
	// replace non letter or digits by divider
	$text = preg_replace("~[^\pL\d]+~u", $divider, $text);
	// transliterate
	$text = iconv("utf-8", "us-ascii//TRANSLIT", $text);
	// remove unwanted characters
	$text = preg_replace("~[^-\w]+~", "", $text);
	// trim
	$text = trim($text, $divider);
	// remove duplicate divider
	$text = preg_replace("~-+~", $divider, $text);
	// lowercase
	$text = strtolower($text);

	return empty($text) ? hashids(mt_rand()) : $text;
}

/**
 * Cut long text neatly
 * 
 * @param string $text
 * @param int $max
 * 
 * @return string
 */
function cuttext($text, $max = 72)
{
	if (strlen($text) > $max) {
		$offset = ($max - 3) - strlen($text);
		$text = substr($text, 0, strrpos($text, " ", $offset)) . " ...";
	}

	return $text;
}

/**
 * Get safe media URL from filename
 * 
 * @param string|null $filename
 * @param string $folder
 * @param string $default
 * 
 * @return string
 */
function safe_media($filename, $folder, $default = "assets/images/no-image.png")
{
	$filename = trim((string) $filename);
	if ($filename === "" || $filename === null) return base_url($default);
	if (filter_var($filename, FILTER_VALIDATE_URL)) return $filename;

	$path = "./uploads/" . rtrim($folder, "/") . "/" . $filename;
	return file_exists($path) ? base_url("uploads/" . $folder . "/" . $filename) : base_url($default);
}

/**
 * Get safe gallery image from filename
 * 
 * @param string|null $gallery
 */
function safe_gallery($gallery)
{
	return safe_media($gallery, "galleries");
}

/**
 * Get safe partner logo from filename
 * 
 * @param string|null $partner
 */
function safe_partner($partner)
{
	return safe_media($partner, "partners");
}

/**
 * Get safe photo from filename
 * 
 * @param string|null $photo
 */
function safe_photo($photo)
{
	return safe_media($photo, "photos");
}

/**
 * Get safe slider image from filename
 * 
 * @param string|null $slider
 */
function safe_slider($slider)
{
	return safe_media($slider, "sliders");
}

/**
 * Get safe thumbnail from filename
 * 
 * @param string|null $thumbnail
 */
function safe_thumbnail($thumbnail)
{
	return safe_media($thumbnail, "thumbnails");
}


/**
 * Get safe file from filename
 * 
 * @param string $file
 */
function safe_file($file)
{
	$file = trim($file);
	if (filter_var($file, FILTER_VALIDATE_URL)) return $file;

	$path = "./uploads/files/" . $file;
	return (($file && !file_exists($path)) ||
		$file === null ||
		$file === "") ? null : base_url("uploads/files/" . $file);
}

/**
 * Generate short unique ids from integers
 * 
 * @param int $id
 * @param string $type
 */
function hashids($id, $type = "encode")
{
	$hashids = new Hashids();

	if ($type == "encode") {
		return $hashids->encode($id, 22062004);
	} else {
		return @$hashids->decode($id)[0];
	}
}

/**
 * Upload and compress image to AVIF
 * 
 * @param \CodeIgniter\HTTP\Files\UploadedFile $file
 * @param string $path
 * @param string|null $oldFile
 * 
 * @return string|null
 */
function upload_image($file, $path, $oldFile = null)
{
	if ($file === null || !$file->isValid() || $file->hasMoved()) {
		return null;
	}

	$path = rtrim($path, "/") . "/";
	$name = $file->getRandomName();
	$name = pathinfo($name, PATHINFO_FILENAME) . ".avif";

	// Temporary move to get the file
	$tempPath = WRITEPATH . "uploads/" . $file->getRandomName();
	$file->move(WRITEPATH . "uploads/", basename($tempPath));

	// Process Image
	$info = getimagesize($tempPath);
	switch ($info['mime']) {
		case 'image/jpeg':
			$image = imagecreatefromjpeg($tempPath);
			break;
		case 'image/png':
			$image = imagecreatefrompng($tempPath);
			imagepalettetotruecolor($image);
			imagealphablending($image, true);
			imagesavealpha($image, true);
			break;
		case 'image/webp':
			$image = imagecreatefromwebp($tempPath);
			break;
		default:
			@unlink($tempPath);
			return null;
	}

	if ($image) {
		// Save as AVIF or WebP as fallback
		$finalName = pathinfo($name, PATHINFO_FILENAME);
		$success = false;

		if (function_exists('imageavif')) {
			$finalName .= ".avif";
			$success = imageavif($image, $path . $finalName, 60);
		} else {
			$finalName .= ".webp";
			$success = imagewebp($image, $path . $finalName, 80);
		}

		if ($success) {
			@unlink($tempPath);
			imagedestroy($image);

			// Delete old file if exists
			if ($oldFile && is_file($path . $oldFile)) {
				@unlink($path . $oldFile);
			}

			return $finalName;
		}
		imagedestroy($image);
	}

	@unlink($tempPath);
	return null;
}

/**
 * Log Visitor Activity
 */
function log_visitor()
{
	$request = \Config\Services::request();
	$agent = $request->getUserAgent();

	// Avoid logging bots
	if ($agent->isRobot()) {
		return;
	}

	// Avoid logging admin panel views if needed, 
	// but usually we call this only in public controllers
	$visitorModel = new \App\Models\VisitorModel();
	$visitorModel->insert([
		'ip_address' => $request->getIPAddress(),
		'user_agent' => $agent->getAgentString(),
		'page_url'   => current_url(),
		'created_at' => date('Y-m-d H:i:s'),
	]);
}
