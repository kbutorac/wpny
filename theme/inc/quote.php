<div class="col-span-12 md:col-start-9 md:col-end-13">
	<div class="bg-light-blue py-10 px-6 md:px-10">
		<svg class="mb-4" xmlns="http://www.w3.org/2000/svg" width="49" height="38" viewBox="0 0 49 38" fill="none">
		<path d="M37 37.25C30.25 37.25 25.875 32.125 25.875 24.75C25.875 14 34 4.375 48 0L48.75 1.5C39 6.5 34.25 14.375 33.75 19.125L34.25 19.375C35.375 18.75 36.625 18.5 38 18.5C42.25 18.5 46.5 21.875 46.5 27.5C46.5 32.625 42.625 37.25 37 37.25ZM11.125 37.25C4.25 37.25 0 32.125 0 24.75C0 14 8 4.375 22 0L22.75 1.5C13 6.5 8.25 14.375 7.75 19.125L8.25 19.375C9.375 18.75 10.625 18.5 12 18.5C16.25 18.5 20.5 21.875 20.5 27.5C20.5 32.625 16.625 37.25 11.125 37.25Z" fill="#2DD8C0"/>
		</svg>
		<?php if ($quote ){ ?>
			<div class="text-black text-[20px] leading-tight"><?=$quote?></div>
		<?php } ?>
		<?php if ($quote_author ){ ?>
			<div class="text-black mt-4 text-[11px] uppercase tracking-[1.4px]"><?=$quote_author?></div>
		<?php } ?>
	</div>
</div>