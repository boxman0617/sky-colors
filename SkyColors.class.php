<?php
class SkyColors
{
	private static $Colors = array(
		'FG' => array(
			'Black'       => '0;30',
			'DarkGray'    => '1;30',
			'Blue'        => '0;34',
			'LightBlue'   => '1;34',
			'Green'       => '0;32',
			'LightGreen'  => '1;32',
			'Cyan'        => '0;36',
			'LightCyan'   => '1;36',
			'Red'         => '0;31',
			'LightRed'    => '1;31',
			'Purple'      => '0;35',
			'LightPurple' => '1;35',
			'Brown'       => '0;33',
			'Yellow'      => '1;33',
			'LightGray'   => '0;37',
			'White'       => '1;37'
		),
		'BG' => array(
			'Black'     => '40',
			'Red'       => '41',
			'Green'     => '42',
			'Yellow'    => '43',
			'Blue'      => '44',
			'Magenta'   => '45',
			'Cyan'      => '46',
			'LightGray' => '47'
		)
	);

	public static function __callStatic($name, $args)
	{
		$cm = strtoupper(substr($name, 0, 2));
		if(array_key_exists($cm, self::$Colors))
		{
			$color = substr($name, 2, strlen($name) - 2);
			if(array_key_exists($color, self::$Colors[$cm]))
				return "\033[".self::$Colors[$cm][$color].'m'.$args[0]."\033[0m";
		}
	}
}