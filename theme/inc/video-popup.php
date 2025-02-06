<?php
if ( ! $poster_image ) {
		// Determine the source of the video and fetch the thumbnail
	if ( $video_type === 'youtube' ) {
			// YouTube thumbnail URL
			$poster_image_url = 'https://img.youtube.com/vi/' . $video_id . '/hqdefault.jpg';
	} elseif ( $video_type === 'vimeo' ) {
			// Fetch Vimeo thumbnail using the API
			$vimeo_data = wp_remote_get( "https://vimeo.com/api/v2/video/$video_id.json" );
		if ( is_wp_error( $vimeo_data ) ) {
				$poster_image_url = ''; // Default fallback if API call fails
		} else {
				$vimeo_data_body  = wp_remote_retrieve_body( $vimeo_data );
				$vimeo_data_array = json_decode( $vimeo_data_body, true );
				$poster_image_url = $vimeo_data_array[0]['thumbnail_large'] ?? ''; // Use large thumbnail
		}
	}
} else {
		// If poster image is uploaded, get its URL
		$poster_image_url = wp_get_attachment_url( $poster_image );
}
?>
	<div class="col-span-12 md:col-start-9 md:col-end-13">
		<div class="vpop relative group text-accent hover:text-dark before:absolute before:left-0 before:right-0 before:top-0 before:z-0 before:h-full before:w-full before:bg-dark before:opacity-30 hover:before:opacity-0 transition-all cursor-pointer" data-type="<?php echo esc_attr( $video_type ); ?>" data-id="<?php echo esc_attr( $video_id ); ?>" data-autoplay='true'>
			<div class="aspect-[16/9]">
				<img src="<?php echo esc_url( $poster_image_url ); ?>" alt="Video Thumbnail" class="mt-0 w-full h-full object-cover" />
			</div>
			<svg class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-12 h-12 transition-all group-hover:w-14 group-hover:h-14" width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
					<g clip-path="url(#clip0_1240_3030)">
							<rect x="0.933594" y="0.599609" width="44.8" height="44.8" rx="22.4" fill="currentColor" />
							<path fill-rule="evenodd" clip-rule="evenodd" d="M23.3336 45.3996C29.2744 45.3996 34.972 43.0396 39.1728 38.8388C43.3736 34.638 45.7336 28.9405 45.7336 22.9996C45.7336 17.0588 43.3736 11.3612 39.1728 7.16042C34.972 2.9596 29.2744 0.599609 23.3336 0.599609C17.3927 0.599609 11.6952 2.9596 7.4944 7.16042C3.29359 11.3612 0.933594 17.0588 0.933594 22.9996C0.933594 28.9405 3.29359 34.638 7.4944 38.8388C11.6952 43.0396 17.3927 45.3996 23.3336 45.3996ZM22.0876 15.07C21.6659 14.7887 21.1758 14.6271 20.6694 14.6025C20.1631 14.5779 19.6596 14.6912 19.2127 14.9304C18.7657 15.1695 18.392 15.5255 18.1315 15.9604C17.8711 16.3953 17.7335 16.8927 17.7336 17.3996V28.5996C17.7335 29.1065 17.8711 29.604 18.1315 30.0388C18.392 30.4737 18.7657 30.8297 19.2127 31.0689C19.6596 31.308 20.1631 31.4213 20.6694 31.3967C21.1758 31.3721 21.6659 31.2105 22.0876 30.9292L30.4876 25.3292C30.8711 25.0735 31.1855 24.7271 31.403 24.3207C31.6204 23.9143 31.7342 23.4605 31.7342 22.9996C31.7342 22.5387 31.6204 22.0849 31.403 21.6785C31.1855 21.2721 30.8711 20.9257 30.4876 20.67L22.0876 15.07Z" fill="white" />
					</g>
					<defs>
							<clipPath id="clip0_1240_3030">
									<rect x="0.933594" y="0.599609" width="44.8" height="44.8" rx="22.4" fill="white" />
							</clipPath>
					</defs>
			</svg>
		</div>
	</div>