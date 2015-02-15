<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/**
 * Express
 *
 * 基于 Codeigniter 的 PHP 系统
 * 
 * Express is an open source system built on the 
 * well-known PHP framework Codeigniter.
 *
 * @package		Express
 * @author		Saturn <prccnn@gmail.com>
 * @copyright	Copyright (c) 2015, Aisin.me.
 * @license		GNU General Public License 2.0
 * @link		http://#/
 * @version		1.0.0
 */
 
// ------------------------------------------------------------------------

class Common
{

/**
     * 对字符串进行hash加密
     * 
     * @access public
     * @param string $string 需要hash的字符串
     * @param string $salt 扰码
     * @return string
     */
    public static function do_hash($pwd, $salt)
    {
		return sha1(md5($pwd) . $salt);
    }

}