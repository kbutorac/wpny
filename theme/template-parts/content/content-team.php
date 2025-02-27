
<?php 
$position = ( get_field('position', get_the_ID()) ) ? : '';
$business_link = ( !empty( get_field('business_link', get_the_ID()) ) ) ? get_field('business_link', get_the_ID()) : '';
$location      = ( get_field('project_location', get_the_ID()) ) ? : '';
?>
<div class="team-member max-w-sm md:max-w-auto mx-auto">
	<?php if ( has_post_thumbnail( get_the_ID() ) ) { ?>

		<a href="<?=get_the_permalink(get_the_ID())?>">
		<?= get_the_post_thumbnail( get_the_ID() , 'team-small', ['class'=>'my-0'] )?>
		</a>

	<?php } ?>
	
		<a class="mt-4 md:mt-0 text-primary font-bold font-heading my-0 text-4xl block uppercase no-underline duration-150 hover:text-secondary transition-all" href="<?=get_the_permalink(get_the_ID())?>"><?=get_the_title()?></a>
		<?php if ($position) { ?>
		<span class="text-primary font-semibold text-xl"><?=$position?></span>
		<?php } ?>
		<?php if( $business_link ){ ?>
		<a class="text-primary hover:text-secondary no-underline flex align-middle gap-x-2" href="<?=$business_link['url']?>">
		<span class="border-b-2 border-[#00EDED] "><?=$business_link['title']?></span>
		<svg class="mt-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
		<path d="M10.9996 3C10.7344 3 10.48 3.10536 10.2925 3.29289C10.1049 3.48043 9.99959 3.73478 9.99959 4C9.99959 4.26522 10.1049 4.51957 10.2925 4.70711C10.48 4.89464 10.7344 5 10.9996 5H13.5856L7.29259 11.293C7.19708 11.3852 7.1209 11.4956 7.06849 11.6176C7.01608 11.7396 6.9885 11.8708 6.98734 12.0036C6.98619 12.1364 7.01149 12.2681 7.06177 12.391C7.11205 12.5139 7.18631 12.6255 7.2802 12.7194C7.37409 12.8133 7.48574 12.8875 7.60864 12.9378C7.73154 12.9881 7.86321 13.0134 7.99599 13.0123C8.12877 13.0111 8.25999 12.9835 8.382 12.9311C8.504 12.8787 8.61435 12.8025 8.70659 12.707L14.9996 6.414V9C14.9996 9.26522 15.1049 9.51957 15.2925 9.70711C15.48 9.89464 15.7344 10 15.9996 10C16.2648 10 16.5192 9.89464 16.7067 9.70711C16.8942 9.51957 16.9996 9.26522 16.9996 9V4C16.9996 3.73478 16.8942 3.48043 16.7067 3.29289C16.5192 3.10536 16.2648 3 15.9996 3H10.9996Z" fill="#070787"/>
		<path d="M5 5C4.46957 5 3.96086 5.21071 3.58579 5.58579C3.21071 5.96086 3 6.46957 3 7V15C3 15.5304 3.21071 16.0391 3.58579 16.4142C3.96086 16.7893 4.46957 17 5 17H13C13.5304 17 14.0391 16.7893 14.4142 16.4142C14.7893 16.0391 15 15.5304 15 15V12C15 11.7348 14.8946 11.4804 14.7071 11.2929C14.5196 11.1054 14.2652 11 14 11C13.7348 11 13.4804 11.1054 13.2929 11.2929C13.1054 11.4804 13 11.7348 13 12V15H5V7H8C8.26522 7 8.51957 6.89464 8.70711 6.70711C8.89464 6.51957 9 6.26522 9 6C9 5.73478 8.89464 5.48043 8.70711 5.29289C8.51957 5.10536 8.26522 5 8 5H5Z" fill="#070787"/>
		</svg>
	</a>
	<?php } ?>
	<?php if ($location) {?>
		<span class="text-primary block mt-1"><?=$location?></span>
	<?php } ?>
	
</div>