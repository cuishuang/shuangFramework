<?php

/**
 * Description of Debug
 * 调试用
 * @author DeanHD
 */

namespace Bdtt;

class Debug {
    /**
     * 输出调试信息
     * @param mix $v
     * @param string $tip
     */
    static function output($v, $tip='begin') {
        $tracelogs = self::getTraceLogs();
        echo '<div style="position:relative;">
        <div style="position:absolute;padding:4px 10px 10px 10px;top:15px;background:#F1F1F1;visibility:hidden;z-index:10;">
        <pre><b>执行路径</b><br>'.print_r($tracelogs,true).'</pre>
        </div><b style="color:blue;font-size:16px;">'.$tip.'</b>
        <pre style="text-align: left;">';
        print_r($v);
        echo '</pre></div>';
        exit;
    }
    
    static function log($v, $di, $tip='default') {
        $tracelogs = self::getTraceLogs();
        $log = '------------'.$tip. ' begin------------'.PHP_EOL;
        $log .= print_r($tracelogs,true) . PHP_EOL;
        $log .= '------------'.$tip. ' value------------'.PHP_EOL;
        $log .= print_r($v,true) . PHP_EOL;
        $log .= '------------'.$tip. ' end------------'.PHP_EOL;
        $di['errorLogger']->debug($log);
    }
    
    static function tinyLog($v, $di, $tip='default') {
        $log = '------------'.$tip. ' value------------'.PHP_EOL;
        $log .= var_export($v,true) . PHP_EOL;
        $log .= '------------'.$tip. ' end------------'.PHP_EOL;
        $di['errorLogger']->debug($log);
    }
    
    /**
     * 获取调试跟踪日志
     * @return array
     */
    static function getTraceLogs(){
        $trace = $backtrace=debug_backtrace();
        $tracelogs = array();
        foreach( $trace as $val ){
            if(!isset($val['class'])) $val['class']='';
            if(!isset($val['function'])) $val['function']='';
            if(!isset($val['file'])) $val['file']='';
            if(!isset($val['line'])) $val['line']='';
            $tracelogs[] = array(
                'file' => $val['file'],
                'class' => $val['class'],
                'function' => $val['function'],
                'line' => $val['line'],
            );
        }
        array_shift($tracelogs); //移除当前方法Debug::out的输出
        unset($trace);
        return $tracelogs;
    }
}
