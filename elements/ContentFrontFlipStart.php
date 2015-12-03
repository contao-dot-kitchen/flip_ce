<?php

namespace Contao;

class ContentFrontFlipStart extends \ContentElement
{
	protected $strTemplate = 'ce_flipFrontStart';

	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$this->strTemplate = 'be_wildcard';

			$objTemplate = new \BackendTemplate($this->strTemplate);

			$this->Template = $objTemplate;
			$this->Template->title = $this->headline;
		}

		return parent::generate();
	}

	protected function compile()
	{
#		$this->code = \Michelf\MarkdownExtra::defaultTransform($this->code);
#		$this->Template->content = strip_tags($this->code, \Config::get('allowedTags'));
	}
}
