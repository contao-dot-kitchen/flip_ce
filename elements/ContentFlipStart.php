<?php

namespace Contao;

class ContentFlipStart extends \ContentElement
{
	protected $strTemplate = 'ce_flipStart';

#	public function generate()
#	{
#
#		return parent::generate();
#	}

	protected function compile()
	{
		if (TL_MODE == 'BE')
		{
			$this->strTemplate = 'be_wildcard';

			$objTemplate = new \BackendTemplate($this->strTemplate);

			$this->Template = $objTemplate;
			$this->Template->title = $this->headline;
		}

		$this->flip_width = deserialize($this->flip_width);
		$this->flip_height = deserialize($this->flip_height);

		$css = '';
		if($this->flip_width['value'])
		{
			$css .= 'width: ' . $this->flip_width['value'] . $this->flip_width['unit'] . ';';
		}

		if($this->flip_height['value'])
		{
			$css .= 'height: ' . $this->flip_height['value'] . $this->flip_height['unit'] . ';';
		}

		$this->Template->css = $css;
	}
}
