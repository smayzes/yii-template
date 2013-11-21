<?php
/**
 * CStringHelper class file.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008-2010 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

/**
 * CStringHelper provides a set of helper methods for string manipulations.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @version $Id$
 * @package system.utils
 * @since 1.1.2
 */
class CStringHelper
{
	/**
	 * Converts a word to its plural form.
	 * For example, 'apple' will become 'apples', and 'child' will become 'children'.
	 * @param string the word to be pluralized
	 * @return string the pluralized word
	 */
	public static function plural($name)
	{
		$rules=array(
			'/(x|ch|ss|sh|us|as|is|os)$/i' => '\1es',
			'/(?:([^f])fe|([lr])f)$/i' => '\1\2ves',
			'/(m)an$/i' => '\1en',
			'/(child)$/i' => '\1ren',
			'/(r)y$/i' => '\1ies',
			'/s$/' => 's',
		);
		foreach($rules as $rule=>$replacement)
		{
			if(preg_match($rule,$name))
				return preg_replace($rule,$replacement,$name);
		}
		return $name.'s';
	}

	/**
	 * Converts a camel-case string into a readable lower-case ID.
	 * For example, 'PostTag' will be converted as 'post-tag'.
	 * @param string the string to be converted
	 * @return string the resulting ID
	 */
	public static function id($name)
	{
		return trim(strtolower(str_replace('_','-',preg_replace('/(?<![A-Z])[A-Z]/', '-\0', $name))),'-');
	}

	/**
	 * Converts a camel-case string into space-separated words.
	 * For example, 'PostTag' will be converted as 'Post Tag'.
	 * @param string the string to be converted
	 * @param boolean whether to capitalize the first letter in each word
	 * @return string the resulting words
	 */
	public static function words($name,$ucwords=true)
	{
		$result=trim(strtolower(str_replace('_',' ',preg_replace('/(?<![A-Z])[A-Z]/', ' \0', $name))));
		return $ucwords ? ucwords($result) : $result;
	}
	
	/**
	 * Intelligently shortens text (and html) 
	 * @param string the text to be truncated
	 * @param int the length of the string to return
	 * @param string the suffix to print at the end of the truncated string
	 * @param boolean whether the string contains HTML
	 * @return string the truncated text
	 */
	public function truncate($text = '', $length = 100, $suffix = '&hellip;', $isHTML = true, $appendix = '&nbsp;'){
		if (strlen($text) < $length) return $text;
        $i = 0;
        $tags = array();
        if($isHTML){
            preg_match_all('/<[^>]+>([^<]*)/', $text, $m, PREG_OFFSET_CAPTURE | PREG_SET_ORDER);
            foreach($m as $o){
                if($o[0][1] - $i >= $length)
                    break;
                $t = substr(strtok($o[0][0], " \t\n\r\0\x0B>"), 1);
                if($t[0] != '/')
                    $tags[] = $t;
                elseif(end($tags) == substr($t, 1))
                    array_pop($tags);
                $i += $o[1][1] - $o[0][1];
            }
        }
       
        $output = substr($text, 0, $length = min(strlen($text),  $length + $i)) . (count($tags = array_reverse($tags)) ? '</' . implode('></', $tags) . '>' : '');
        // Get everything until last space
        $one = substr($output, 0, strrpos($output, " "));
        // Get the rest
        $two = substr($output, strrpos($output, " "), (strlen($output) - strrpos($output, " ")));
        // Extract all tags from the last bit
        preg_match_all('/<(.*?)>/s', $two, $tags);
        // Add suffix if needed
        if (strlen($text) > $length) { $one .= $appendix . $suffix; } else { $one .= $appendix; }
        // Re-attach tags
        $output = $one . implode($tags[0]);

        return $output;
    }
}