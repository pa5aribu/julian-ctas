<?php
	$states = ["Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware", "Florida", "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York", "North Carolina", "North Dakota", "Ohio", "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island", "South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Vermont", "Virginia", "Washington", "West Virginia", "Wisconsin", "Wyoming"];
	
	?>
	<div class="states-wrapper-wrapper md:bg-white md:rounded-lg ">
 	<div class="overflow-scroll border-t border-b border-white states-wrapper border-opacity-25 md:border-t-0 md:border-b-0">
		<ul class="states-list states-carousel">
			<?php
				foreach($states as $state) {
					$id = str_replace(' ', '-', $state);
					$id = strtolower($id);
					echo '<li data-id="'.$id.'" class="pt-2 pb-3 leading-none cursor-pointer md:py-2 md:px-4 carousel-cell state">'. $state .'</li>';
				}
			?>
		</ul>
	</div>
	</div>
	<?php
?>
