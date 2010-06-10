<?php
/**
 * AtomCode
 * 
 * A open source application,welcome to join us to develop it.
 *
 * @copyright (c)  2009 http://www.cncms.com.cn
 * @link http://www.cncms.com.cn
 * @author Eachcan <eachcan@gmail.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version 1.0 2010-5-30
 * @filesource 
 */
class Container
{

	protected $config,$input,$get,$post,$cookie,$session,$request_method, $isPost;
	
	public function __construct()
	{
		global $var;
		$this->config			=& $var->config;
		$this->get				=& $var->get;
		$this->post				=& $var->post;
		$this->input			=& $var->input;
		$this->cookie			=& $var->cookie;
		$this->session			=& $var->session;
		$this->request_method	= $var->request_method;
		
		$this->isPost			= is_post();
	}
}