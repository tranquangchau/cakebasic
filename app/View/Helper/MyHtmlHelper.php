<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('HtmlHelper', 'View/Helper');
class MyHtmlHelper extends HtmlHelper {
	public function url($url = null, $full = true) {
         //var_dump($this->params['language']);die;
        if(!isset($url['language']) && isset($this->params['language'])) {
          //var_dump($url);
          // $url["x"] = 42;
           
//            $url['language'] =$this->params['language'];
            //die;
             //var_dump($url);die;
                  //$this->params['language'];
//            return $this->redirect($_SERVER['HTTP_REFERER']);
        }
//        return $this->redirect($_SERVER['HTTP_REFERER']);
//        $full = $_SERVER['HTTP_REFERER'];
//        echo $full;die;
        return parent::url($url, $full);
   }
}

