<?php

namespace Contao;

class ContentFlipStop extends \ContentElement
{
	protected $strTemplate = 'ce_flipStop';

	protected function compile()
	{
		if (TL_MODE == 'BE')
		{
			$this->strTemplate = 'be_wildcard';

			/** @var \BackendTemplate|object $objTemplate */
			$objTemplate = new \BackendTemplate($this->strTemplate);

			$this->Template = $objTemplate;
		}

		// Previous and next labels
		$this->Template->previous = $GLOBALS['TL_LANG']['MSC']['previous'];
		$this->Template->next = $GLOBALS['TL_LANG']['MSC']['next'];
	}
}
