<?php
/**
T4 Overide
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ContentHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\CMS\Router\Route;
use Joomla\Component\Contact\Site\Helper\RouteHelper;

if(!class_exists('ContentHelperRoute')){
	if(version_compare(JVERSION, '4', 'ge')){
		abstract class ContentHelperRoute extends \Joomla\Component\content\Site\Helper\RouteHelper{};
	}else{
		JLoader::register('ContentHelperRoute', $com_path . '/helpers/route.php');
	}
}

$tparams = $this->item->params;
?>

<div class="com-contact contact <?php echo $this->pageclass_sfx; ?>" itemscope itemtype="https://schema.org/Person">
  <?php if ($tparams->get('show_page_heading')) : ?>
    <h1>
      <?php echo $this->escape($tparams->get('page_heading')); ?>
    </h1>
  <?php endif; ?>

  <?php if ($this->item->name && $tparams->get('show_name')) : ?>
    <div class="page-header">
      <h2>
        <?php if ($this->item->published == 0) : ?>
          <span class="badge badge-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span>
        <?php endif; ?>
        <span class="contact-name" itemprop="name"><?php echo $this->item->name; ?></span>
      </h2>
    </div>
  <?php endif; ?>

	<div class="request-offer">
		<div class="row">
			<div class="col-12 col-md-5">
				<div class="alert alert-info">
					<?php echo $this->item->misc; ?>
				</div>
			</div>

			<div class="col-12 col-md-7">
				<div class="request-form">
					<?php echo $this->loadTemplate('form'); ?>
				</div>
			</div>
		</div>
		
	</div>

	<?php echo $this->item->event->afterDisplayContent; ?>
</div>
