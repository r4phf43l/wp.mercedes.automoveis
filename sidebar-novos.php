<?
$cat = get_the_title();
if (strpos($cat, 'culos Novos')) { $acat = 'automoveis'; }
if (strpos($cat, 'culos AMG Novos')) { $acat = 'amg'; }
if (strpos($cat, 'nibus Novos')) { $acat = 'onibus'; }
if (strpos($cat, 'es Novos')) { $acat = 'caminhoes'; }

?>
<div class="sidebar sidebar-content" id="sidebar-content">
	<li class="widget widget_nav_menu" id="nav_menu-1">
		<h2 class="widgettitle" style="display: block"><? echo $cat; ?></h2>
		<div>
			<ul class="menu">			
				<?			
				$cclasses = get_theme_mod('mcbra_classes_count_setting')!="" && get_theme_mod('mcbra_classes_count_setting')>0 ? get_theme_mod('mcbra_classes_count_setting') : 10;
				for ($i=1; $i<=$cclasses; $i++) { 
					if ((get_theme_mod('mcbra_classes_cats_setting_' . $i)==$acat) && (get_theme_mod('mcbra_classes_active_setting_' . $i)!=1)) {	
						echo "<li class='menu-item menu-item-type-custom menu-item-object-custom menu-item-" . $i . "' id='menu-item-" . $i . "'><a href='" . get_theme_mod('mcbra_classes_url_setting_' . $i) . "' target='_blank'>" . get_theme_mod('mcbra_classes_count_setting_' . $i) . "</a></li>";						
					}		
				}				
				?>				
			</ul>
		</div>
	</li>
</div>
