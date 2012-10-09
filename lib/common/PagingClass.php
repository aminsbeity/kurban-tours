<?php
class PagingClass {
	
	private $object;
	public $recordsCount = 0;
	public $currentPageNb = 1;
	
	function __construct($object, $currentPageNb = 1) {
		$this->object = $object;
		$this->currentPageNb = $currentPageNb;
	}
	
	/**
	 * Prepare the paging class members
	 * @return the offset;
	 *
	 */
	function getOffset() {
		$object = $this->object;
		$offset = ($this->currentPageNb - 1) * $object->recordsPerPage;
		return $offset;
	}
	
	private function createInstance() {
		
		return new $this->className ( );
	
	}
	
	/**
	 * Display the number of pages
	 * with the given link
	 *
	 * @param String $link
	 * @param String $cssClass
	 * @param String $tableName
	 */
	/**
	 * Display the number of pages
	 * with the given link
	 *
	 * @param String $link
	 * @param String $cssClass
	 * @param String $tableName
	 */
	function setPaging($link, $tableName, $recordsCount, $page = 1) {
		$object = $this->object;
		$object->tableName = $tableName;
		$numberOfPages = ceil ( $recordsCount / $object->recordsPerPage );
		if ($numberOfPages > 1) {
			echo '<table   cellpadding="0" cellspacing="0" border="0" align="center" >';
			echo '<tr>';
			for($i = 1; $i <= $numberOfPages; $i ++) {
				if ($page == $i) {
					$css = "font12 orange bgHot";
				} else {
					$css = "font12";
				}
				echo '<td width="15" align="center">';
				echo "<a href='$link&pageNb=$i'><div class='" . $css . "'>$i</div></a>";
				echo '</td>';
				echo '<td  width="3" >&nbsp;</td>';
			}
			echo '</tr></table>';
		}
	
	}
	
	/**
	 * Enter description here...
	 *
	 * @param String  $link
	 * @param String $tableName
	 * @param INT $page
	 * @param INT $recordsCount
	 * Next and Back included
	 */
	function setPagingClass($link, $tableName, $page, $recordsCount) {
		$object = $this->object;
		$object->tableName = $tableName;
		$numberOfPages = ceil ( $recordsCount / $object->recordsPerPage );
		
		if ($page > 1) {
			$pageNumberBack = $page - 1;
		}
		if ($page < $numberOfPages) {
			$pageNumberNext = $page + 1;
		}
		if ($numberOfPages > 1) {
			
			echo '<table   cellpadding="0" cellspacing="0" border="0" align="">';
			echo '<tr>';
			echo "<td width='6'>";
			if ($pageNumberBack != "") {
				echo "<a href='$link&page=$pageNumberBack' style='text-decoration:none;'>";
			}
			echo "Ø§Ù„ØµÙ�Ø­Ø§Øª</a></td>";
			echo '<td  width="3" >&nbsp;</td>';
			for($i = 1; $i <= $numberOfPages; $i ++) {
				if ($page == $i) {
					$css = "red";
				} else {
					$css = "gray";
				}
				echo '<td width="15" align="" class="' . $css . '">';
				echo "<a href='$link&page=$i' style='text-decoration:none;'><span class='" . $css . "'>$i</span></a>";
				echo '</td>';
				echo '<td  width="3" >&nbsp;</td>';
			}
			
			echo "<td width='6'>";
			if ($pageNumberNext != "") {
				echo "<a href='$link&page=$pageNumberNext' style='text-decoration:none;'>";
			}
			echo "</a></td>";
			echo '</tr></table>';
		}
	
	}
	
	/*function setPagingClassA($link,$page, $numberOfPages) {
		
		
		
		if ($page > 1) {
			$pageNumberBack = $page - 1;
		}
		if ($page < $numberOfPages) {
			$pageNumberNext = $page + 1;
		}
		if ($numberOfPages > 1) {
			
			echo '<table cellpadding="0" cellspacing="0" border="0">';
			echo '<tr>';
			echo '<td width="6"><img src="images/arrow11.gif" width="6" /></td>';
			echo "<td width='6' class=' darkGray font12px bold'>";
			if ($pageNumberBack != "") {
				echo "<a href='$link/$pageNumberBack' style='text-decoration:none;'>";
			}
			echo "&laquo;Back</a></td>";
			
			for($i = 1; $i <= $numberOfPages; $i ++) {
				if ($page == $i) {
					$css = "font12px red bold";
				} else {
					$css = "font12px darkGray";
				}
				echo '<td width="2">&nbsp;</td>';
				echo '<td width="12" height="14" align="center" class="' . $css . '">';
				
				echo "<a href='$link/$i' style='text-decoration:none;'>".$i."</a>";
				echo '</td>';
			
			}
			echo '<td  width="3" >&nbsp;</td>';
			echo "<td width='6' class='darkGray font12px bold'>";
			if ($pageNumberNext != "") {
				echo "<a href='$link/$pageNumberNext' style='text-decoration:none;'>";
			}
			echo "Next&raquo;</a></td>";
		
			echo '</tr></table>';
			
		}
	
	}*/
	
	/*function setPagingClassA($link, $page, $numberOfPages, $dir) {
		
		$pagingLimit = $page + 9;
		
		if ($pagingLimit > $numberOfPages) {
			$pagingLimit = $numberOfPages;
		}
		
		if ($page > 1) {
			$pageNumberBack = $page - 1;
		}
		if ($page < $numberOfPages) {
			$pageNumberNext = $page + 1;
		}
		
		if ($numberOfPages > 1) {
			echo '<table border="0" cellpadding="0" cellspacing="0" class="bold font12px arial" dir="' . $dir . '">';
			echo '<tr valign="middle" align="center">';
			
			if ($page > 1) {
				echo '<td width="5"></td>';
				echo '<td valign="top" style="border:1px solid #c9c9c9;padding:2px 2px"  >';
				echo "<a href='$link/1' style='text-decoration:none;' class='pageSwitchingActive'>" . FIRST_PAGE . "</a>";
				echo '</td>';
				echo '<td width="5"></td>';
			}
			
			echo '<td valign="top" style="border:1px solid #c9c9c9;padding:2px 2px"  >';
			if ($pageNumberBack != "") {
				echo "<a href='$link/$pageNumberBack' style='text-decoration:none;' class='pageSwitchingActive'>" . BACK . "</a>";
			} else {
				echo '<span class="pageSwitchingInActive">' . BACK . '</span>';
			}
			echo "</td>";
			echo '<td  width="5" >&nbsp;</td>';
			for($i = $page; $i <= $pagingLimit; $i ++) {
				if ($page == $i) {
					$css = "activePage";
				} else {
					$css = "inActivePage";
				}
				echo '<td valign="top" style="border:1px solid #c9c9c9;padding:2px 2px" class="' . $css . '"  > ';
				echo "<a href='$link/$i' style='text-decoration:none;'>$i</a>";
				echo '</td>';
				
				echo '<td  width="3" >&nbsp;</td>';
			
			}
			echo ' <td valign="top" style="border:1px solid #c9c9c9;padding:2px 2px">';
			if ($pageNumberNext != "") {
				echo "<a href='$link/$pageNumberNext' style='text-decoration:none;'  class='pageSwitchingActive'>" . NEXT . "</a>";
			} else {
				echo '<span class="pageSwitchingInActive">' . NEXT . '</span>';
			}
			echo "</td>";
			
			if ($page < $numberOfPages && $numberOfPages > 9) {
				echo '<td width="5"></td>';
				echo '<td valign="top" style="border:1px solid #c9c9c9;padding:2px 2px"  >';
				echo "<a href='$link/$numberOfPages' style='text-decoration:none;' class='pageSwitchingActive'>" . LAST_PAGE . "</a>";
				echo '</td>';
				echo '<td width="5"></td>';
			}
			
			echo '</tr></table>';
		}
	
	}*/
	
	function setPagingClassA($link, $page, $numberOfPages) {
		
		if ($numberOfPages > 1) {
			echo '<table align="center" border="0" cellpadding="0" cellspacing="0" style="color:#6d6e71" class="font12px verdana " >';
			echo '<tr valign="middle" align="center" valign="bottom">';
			echo '<td  width="5" >&nbsp;</td>';
			for($i = 1; $i <= $numberOfPages; $i ++) {
				if ($page == $i) {
					$css = "activePage white";
				} else {
					$css = "inActivePage white";
				}
				echo '<td valign="middle"  class="' . $css . '"> ';
				
				if ($page != $i) {
				echo "<a href='$link/$i' style='text-decoration:none;'>";
				}
				echo $i;
				if ($page != $i) {
				echo "</a>";
				}
				
				echo '</td>';
				echo '<td  width="5" align="center"></td>';
			}
			echo '</tr></table>';
		}
	
	}

}

?>