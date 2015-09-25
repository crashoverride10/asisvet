<?php
	require_once 'connectbd.php';
	$db = new DB_Connect();
	$conn = $db->connect();
	
	$menu_items = Array();
	$padre = '';
	$query = "select id, id_padre, direccion_pagina, nombre, clase_icono, (select count(*) from menu_item i where i.id_padre = m.id) as hijos from menu_item m";
	$result = mysqli_query($conn,$query);
	while($row = mysqli_fetch_array($result)){
		if(basename($_SERVER['PHP_SELF']) == $row['direccion_pagina']){
			$row['clase'] = 'A';
			$padre = $row['id'];
		}else{
			$row['clase'] = 'X';
		}
		$menu_items[] = $row;
	}

	while($padre != ""){
		foreach($menu_items as $key => $m_item){
			if($m_item['id'] == $padre){
				$menu_items[$key]['clase'] = 'A';
				$padre = $m_item['id_padre'];
			}
		}
	}
	
	/*function menu($padre,$menu_items,$lvl){
		$i=0;
		foreach($menu_items as $m_item){
			if($m_item['id_padre'] == $padre){
				$i += 1;
					if($lvl == 1){
						echo "<a>";
						echo $m_item['direccion_pagina'];
							echo "<cont>";
							menu($m_item['id'],$menu_items,$lvl+1);
							echo "</cont>";
						echo "</a>";
					}else{
						echo "<b>";
						echo $m_item['direccion_pagina'];
						echo "</b>";
					}
			}
		}
	}*/
	
	function menu_item($padre,$menu_items,$lvl){
		$i=0;
		foreach($menu_items as $m_item){
			if($m_item['id_padre'] == $padre){
					$i += 1;
					if($lvl == 1){
						echo '<li class="start">
							<a href="javascript:;">
							<i class="icon-home"></i>
							<span class="title">'.$m_item['nombre'].'</span>
							<span class="arrow "></span>
							</a>
							<ul class="sub-menu">';
							menu_item($m_item['id'],$menu_items,$lvl+1);
						echo '</ul></li>';
					}else{
						if($m_item['hijos']){
							echo '<li><a href="javascript:;">
								<i class="icon-folder"></i>
								<span class="title">'.$m_item['nombre'].'</span>
								<span class="arrow "></span>
								</a>';
							echo '<ul class="sub-menu">';
							menu_item($m_item['id'],$menu_items,$lvl+1);
							echo '</ul></li>';
						}else{
							echo '<li>
								<a href="'.$m_item['direccion_pagina'].'">
								<i class="icon-bar-chart"></i>
								'.$m_item['nombre'].'</a></li>';
						}
					}	
			}
		}
	}
	//menu_item('',$menu_items,1);
?>