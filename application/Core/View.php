<?php

namespace Core;

class View
{
	function generate($content_view, $template_view, $data = null)
	{
	    $content_view = $content_view . '.php';
		include 'application/views/'.$template_view.'.php';
	}
}
