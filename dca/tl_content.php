<?php

$GLOBALS['TL_DCA']['tl_content']['config']['onsubmit_callback'][] = array('tl_content_flip_ce', 'onSubmitCallback');
$GLOBALS['TL_DCA']['tl_content']['palettes']['flipStart'] = '{type_legend},type,headline;{flip_legend},flip_width,flip_height;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['fields']['flip_width'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['flip_width'],
	'inputType'               => 'inputUnit',
	'options'                 => $GLOBALS['TL_CSS_UNITS'],
	'eval'                    => array('includeBlankOption'=>true, 'rgxp'=>'digit_auto_inherit', 'maxlength' => 20, 'tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['flip_height'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['flip_height'],
	'inputType'               => 'inputUnit',
	'options'                 => $GLOBALS['TL_CSS_UNITS'],
	'eval'                    => array('includeBlankOption'=>true, 'rgxp'=>'digit_auto_inherit', 'maxlength' => 20, 'tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

class tl_content_flip_ce extends \Backend
{
	public function __construct()
	{
		parent::__construct();
	}

	public function onSubmitCallback($dc)
	{

		if(!$dc->activeRecord)
		{
			return;
		}
		else
		{
			$data = $dc->activeRecord;
			$arrayElements = array('flipStart', 'flipFrontStart', 'flipBackStart');

			if(in_array($data->type, $arrayElements))
			{
				$foundStop = false;
				$foundStart = false;
				$sorting = 0;

				$nextCE = $this->Database->prepare("SELECT type, sorting FROM tl_content WHERE pid = ? && (ptable = ? OR ptable = ?) && type IN ('flipStart', 'flipStop', 'flipFrontStart', 'flipFrontStop', 'flipBackStart', 'flipBackStop') && sorting > ? ORDER BY sorting ASC")->execute($data->pid, $data->ptable ?: 'tl_article', $data->ptable === 'tl_article' ? '' : $data->ptable, $data->sorting);
				while($nextCE->next())
				{
					if($data->type == $nextCE->type)
					{
						$foundStart = true;
					}

					if(substr($data->type, 0, -5) . 'Stop' == $nextCE->type && !$foundStart)
					{
						$foundStop = true;
					}

					if(!$foundStart && !$foundStop)
					{
						if($data->type == 'flipStart' && ($nextCE->type == 'flipFrontStop' OR $nextCE->type == 'flipBackStop'))
						{
							$sorting = $nextCE->sorting;
						}

						if($data->type == 'flipFrontStart' && $nextCE->type == 'flipFrontStop')
						{
							$sorting = $nextCE->sorting;
						}

						if($data->type == 'flipBackStart' && $nextCE->type == 'flipBackStop')
						{
							$sorting = $nextCE->sorting;
						}
					}
				}

				if(!$sorting)
				{
					$sorting = $data->sorting;
				}

				if(!$foundStart && !$foundStop && $sorting)
				{
					$this->Database->prepare('INSERT INTO tl_content %s')->set(array
					(
						'pid'     => $data->pid,
						'ptable'  => $data->ptable ?: 'tl_article',
						'type'    => substr($data->type, 0, -5) . 'Stop',
						'sorting' => $sorting + 1,
						'tstamp'  => time()
					))->execute();
				}			
			}
		}
	}
}