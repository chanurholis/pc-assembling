<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends MY_Controller
{
	public function index()
	{
		echo $this->blade->view()->make('welcome_message');
	}
}
