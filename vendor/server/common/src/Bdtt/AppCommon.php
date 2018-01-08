<?php
namespace Bdtt;

class AppCommon {
	const PASSWORD_SALT = '3NzaC1yc2EAAAABIwAAAQEAwZ8BWXJ92Kz638Xn/7/sPiqZqBkOekcbFW7Y1ixRYUi7NmnkLD35nwToH7+95W7lWuTy4rXirGIIxmOpyQLvP8Zp108/OrjbtQTzKYEko';
	const FAST_SECRET_KEY = 'B25D32c91';
	const VALID_NEWS_STATUS = " is_delete=0 and status=1 ";
	const NOT_DELETED_STATUS = " is_delete=0 ";

	static function echoJson($code, $data, $msg) {
		$content = array(
			"code" => $code,
			"data" => $data,
			"msg" => $msg,
		);
		echo json_encode($content, JSON_UNESCAPED_UNICODE);
	}

	/**
	 * 转换null为默认值
	 * @param mixed $value
	 * @param mixed $default
	 * @return mixed
	 */
	static function convertNull($value, $default = "") {
		if (is_null($value)) {
			return $default;
		} else {
			return $value;
		}
	}

	/**
	 * 可靠的获取数组内的值
	 * @param array $array
	 * @param string/integer $key
	 * @return mixed
	 */
	static function getValueReliable($array, $key, $default = null) {
		return isset($array[$key]) ? $array[$key] : $default;
	}

	/**
	 * 生产加密字符串
	 * @param  string $udid 机器码
	 * @param  string $time 微妙级时间戳
	 * @return string       加密字符串
	 */
	static function generateSecurity($udid, $time) {
		$key = $udid . $time . self::PASSWORD_SALT;
		$secret = md5($key);
		return $secret;
	}

	static function formatHMTime($time) {
		$now = time();
		$then = strtotime($time);
		$diff = $now - $then;
		if ($diff < 3600) {
			// 一小时以内
			$minites = (int) ($diff / 60);
			$m = (0 == $minites) ? 1 : $minites;
			return (string) $m . '分钟前';
		} elseif ($diff < 86400) {
			//一天以内
			$hours = (int) ($diff / 3600);
			return (string) $hours . '小时前';
		} else {
			$mAndD = date('m-d', $then);
			return $mAndD;
		}
	}

	static function fastEncrypt($txt, $key = self::FAST_SECRET_KEY) {
		$encrypt_key = md5($key);

		$ctr = 0;
		$tmp = '';

		for ($i = 0; $i < strlen($txt); $i++) {
			$ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
			$tmp .= $txt[$i] ^ $encrypt_key[$ctr++];
		}

		return base64_encode($tmp);
	}

	/**
	 * Passport 解密函数
	 *
	 * @param    string    加密后的字串
	 * @param    string    私有密匙(用于解密和加密)
	 *
	 * @return    string    字串经过私有密匙解密后的结果
	 */
	static function fastDecrypt($txt, $key = self::FAST_SECRET_KEY) {
		$encrypt_key = md5($key);
		$txt = base64_decode($txt);

		$ctr = 0;
		$tmp = '';

		for ($i = 0; $i < strlen($txt); $i++) {
			$ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
			$tmp .= $txt[$i] ^ $encrypt_key[$ctr++];
		}

		return $tmp;
	}

	/**
	 * 本地资讯展现ABTEST按机器码取模
	 * @param  string $udid 机器码
	 * @return int       ab标注
	 */
	static function abTestWithLocalNews($udid) {
		$str = substr($udid, -1);
		$Blabel = array('0', '1', '2', '3', '4', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm');
		if (in_array($str, $Blabel)) {
			return 1;
		} else {
			return 0;
		}
	}

	static function curl($url, $timeout, $ext = []) {
		try {
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url);
			if (array_key_exists('header', $ext)) {
				curl_setopt($curl, CURLOPT_HEADER, 1);
			}
			if (array_key_exists('post', $ext)) {
				curl_setopt($curl, CURLOPT_POST, 1);
				isset($ext['fields']) ? curl_setopt($curl, CURLOPT_POSTFIELDS, $ext['fields']) : curl_setopt($curl, CURLOPT_POSTFIELDS, array());
			}
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_TIMEOUT_MS, $timeout);
			$data = curl_exec($curl);
		} catch (Exception $e) {
			$data = false;
		} finally {
			curl_close($curl);
		}
		return $data;
	}
}
