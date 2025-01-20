(function($){
    var initializeBlock = function( $block ) {
        // Check if the block has the 'vertical' class
        var isVertical = $block.hasClass('vertical');

        $block.find('.acf-innerblocks-container').slick({
            dots: true,
            infinite: true,
            slidesToShow: 1,
            rows: 0,
            // Set arrows based on the presence of the 'vertical' class
            arrows: isVertical,
            // Add custom arrows if isVertical is true
            prevArrow: isVertical ? '<div class="slick-arrow prev"><svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="21" cy="21" r="21" transform="rotate(-180 21 21)" fill="#E6222F"/><g clip-path="url(#clip0_257_788)"><path d="M11.1378 21.4229C12.2588 22.3498 13.386 23.2768 14.507 24.2037C16.2969 25.6809 18.0868 27.158 19.8829 28.6352C20.2978 28.976 20.7066 29.3169 21.1215 29.6578C21.3755 29.8671 21.7471 29.897 21.9948 29.6578C22.2178 29.4425 22.2487 29.0239 21.9948 28.8146C20.8738 27.8876 19.7466 26.9607 18.6256 26.0337C16.8357 24.5566 15.0458 23.0794 13.2497 21.6023C13.0059 21.4019 12.7638 21.2016 12.5218 21.001C13.474 20.2146 14.4293 19.4284 15.3803 18.642C17.1702 17.1649 18.96 15.6877 20.7561 14.2106C21.1711 13.8697 21.5799 13.5289 21.9948 13.188C22.2487 12.9787 22.2178 12.56 21.9948 12.3447C21.7409 12.0996 21.3755 12.1354 21.1215 12.3447C20.0005 13.2717 18.8733 14.1986 17.7523 15.1256C15.9625 16.6027 14.1726 18.0799 12.3765 19.557C11.9615 19.8979 11.5528 20.2388 11.1378 20.5797C10.8963 20.777 10.8963 21.2255 11.1378 21.4229Z" fill="white"/><path d="M18.8111 19.557C18.3961 19.8978 17.9873 20.2387 17.5724 20.5796C17.3308 20.7769 17.3308 21.2255 17.5724 21.4228C18.6934 22.3498 19.8206 23.2767 20.9416 24.2037C22.7315 25.6808 24.5214 27.158 26.3174 28.6351C26.7324 28.976 27.1412 29.3168 27.5561 29.6577C27.81 29.867 28.1816 29.8969 28.4294 29.6577C28.6523 29.4424 28.6833 29.0238 28.4294 28.8145C27.3084 27.8876 26.1812 26.9606 25.0602 26.0337C23.2703 24.5565 21.4804 23.0794 19.6843 21.6022C19.4405 21.4019 19.1984 21.2015 18.9563 21.001C19.9086 20.2145 20.8639 19.4284 21.8148 18.642C23.6047 17.1648 25.3946 15.6877 27.1907 14.2105C27.6057 13.8697 28.0144 13.5288 28.4294 13.1879C28.6833 12.9786 28.6523 12.56 28.4294 12.3447C28.1816 12.0995 27.81 12.1354 27.5561 12.3447C26.4351 13.2716 25.3079 14.1986 24.1869 15.1255C22.397 16.6027 20.6071 18.0798 18.8111 19.557Z" fill="white"/></g><defs><clipPath id="clip0_257_788"><rect width="17.6522" height="17.6522" fill="white" transform="translate(28.6084 29.8262) rotate(-180)"/></clipPath></defs></svg></div>' : '',
            nextArrow: isVertical ? '<div class="slick-arrow next"><svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="21" cy="21" r="21" fill="#E6222F"/><g clip-path="url(#clip0_257_789)"><path d="M30.8622 20.5771C29.7412 19.6502 28.614 18.7232 27.493 17.7963C25.7031 16.3191 23.9132 14.842 22.1171 13.3648C21.7022 13.024 21.2934 12.6831 20.8785 12.3422C20.6245 12.1329 20.2529 12.103 20.0052 12.3422C19.7822 12.5575 19.7513 12.9761 20.0052 13.1854C21.1262 14.1124 22.2534 15.0393 23.3744 15.9663C25.1643 17.4434 26.9542 18.9206 28.7503 20.3977C28.9941 20.5981 29.2362 20.7984 29.4782 20.999C28.526 21.7854 27.5707 22.5716 26.6197 23.358C24.8298 24.8351 23.04 26.3123 21.2439 27.7894C20.8289 28.1303 20.4202 28.4711 20.0052 28.812C19.7513 29.0213 19.7822 29.44 20.0052 29.6553C20.2591 29.9004 20.6245 29.8646 20.8785 29.6553C21.9995 28.7283 23.1267 27.8014 24.2477 26.8744C26.0375 25.3973 27.8274 23.9201 29.6235 22.443C30.0385 22.1021 30.4472 21.7612 30.8622 21.4203C31.1037 21.223 31.1037 20.7745 30.8622 20.5771Z" fill="white"/><path d="M23.1889 22.443C23.6039 22.1022 24.0127 21.7613 24.4276 21.4204C24.6692 21.2231 24.6692 20.7745 24.4276 20.5772C23.3066 19.6502 22.1794 18.7233 21.0584 17.7963C19.2685 16.3192 17.4786 14.842 15.6826 13.3649C15.2676 13.024 14.8588 12.6832 14.4439 12.3423C14.19 12.133 13.8184 12.1031 13.5706 12.3423C13.3477 12.5576 13.3167 12.9762 13.5706 13.1855C14.6916 14.1124 15.8188 15.0394 16.9398 15.9663C18.7297 17.4435 20.5196 18.9206 22.3157 20.3978C22.5595 20.5981 22.8016 20.7985 23.0437 20.999C22.0914 21.7855 21.1361 22.5716 20.1852 23.358C18.3953 24.8352 16.6054 26.3123 14.8093 27.7895C14.3943 28.1303 13.9856 28.4712 13.5706 28.8121C13.3167 29.0214 13.3477 29.44 13.5706 29.6553C13.8184 29.9005 14.19 29.8646 14.4439 29.6553C15.5649 28.7284 16.6921 27.8014 17.8131 26.8745C19.603 25.3973 21.3929 23.9202 23.1889 22.443Z" fill="white"/></g><defs><clipPath id="clip0_257_789"><rect width="17.6522" height="17.6522" fill="white" transform="translate(13.3916 12.1738)"/></clipPath></defs></svg></div>' : '',
            appendDots: $block.find('.dots-nav'),
        });
    }

    // Initialize each block on page load (front end).
    $(document).ready(function(){
        $('.block-slider-container').each(function(){
            initializeBlock( $(this) );
        });
    });

})(jQuery);
