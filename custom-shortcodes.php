<?php 
    function newsletter_form(){
        return '
        <div class="flex justify-start">
            <div class="w-[450px]">
                <form method="post" class="relative flex items-center text-sm">
                <input type="email" name="email" id="email" placeholder="Get 5 new tips in your inbox every Monday" class="w-full bg-transparent py-2 pl-5 pr-20 border-2 border-solid border-gray-200 rounded-lg outline-none placeholder:text-black/50" required />
                <button type="submit" class="absolute h-full rounded right-0 bg-black text-white px-4 flex items-center cursor-pointer">
                    <p class="">Yes please :)</p>
                    <i class="bx bx-chevron-right text-2xl block sm:hidden"></i>
                </button>
                </form>
            </div>
        </div>
        ';
        }
    add_shortcode('newsletter', 'newsletter_form');
?>