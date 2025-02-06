<div class="col-span-12 md:col-start-9 md:col-end-13">
	<div class="bg-light-blue py-10 px-6 md:py-16 md:px-10 relative overflow-hidden">
		<div class="relative z-[1] flex flex-col items-center justify-center">
			<?php if ($stats_counter ){ ?>
				<h4 class="counter text-[40px] md:text-[60px] text-[#2DD8C0]" data-count="<?php echo $stats_counter; ?>">
					<span class="number">0</span>
				</h4>
			<?php } ?>
			<?php if ($stats_title ){ ?>
				<h4 class="text-black text-[20px] md:text-[26px]"><?=$stats_title?></h4>
			<?php } ?>
		</div>
		<svg class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" width="210" height="174" viewBox="0 0 210 174" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path opacity="0.3" d="M129 128.754L209 172V45.2456L129 2V128.754Z" stroke="#83E3DE" stroke-width="2"/>
			<path opacity="0.3" d="M1 128.754L82 172V45.2456L1 2V128.754Z" stroke="#83E3DE" stroke-width="2"/>
			<path opacity="0.3" d="M64 128.754L145 172V45.2456L64 2V128.754Z" stroke="#83E3DE" stroke-width="2"/>
		</svg>
	</div>
</div>